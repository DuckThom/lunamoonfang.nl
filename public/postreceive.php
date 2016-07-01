<?php

error_reporting(0);
ini_set('display_errors', 0);

$url = (isset($_POST['canon_url']) ? $_POST['canon_url'] : false);
$user = (isset($_POST['user']) ? $_POST['user'] : false);

if (isset($_POST['ref'])) {
    if ($_POST['ref'] !== 'refs/heads/5.1') {
        sendResponseAndExit(202, 'Wrong branch!!!!!11oneoneone');
    }
}

// This file will contain define("GITHUB_WEBHOOK_SECRET_KEY", ''); - defining the github secret key for the webhook.
$githubKeyFile = '../.github_webhook_secret_key.php';

// Script to call that will update our website.
// Be wary: this is shell_exec()'d. For the safety of the system, it may only call an existing executable file.
$updateScript = '../update.sh';

// Check if our update script exists, and if it is executable.
if (! file_exists($updateScript) || ! is_executable($updateScript)) {
    sendResponseAndExit(500, 'Internal Server Error');
}

// Check if we have a github secret key for the webhook.
// Without it, we will not be able to verify if the request is coming from github.
if (! file_exists($githubKeyFile) || ! is_readable($githubKeyFile)) {
    sendResponseAndExit(500, 'Internal Server Error');
}

include $githubKeyFile;

if (! isset($_SERVER['HTTP_X_HUB_SIGNATURE'])) {
    sendResponseAndExit(401, 'Unauthorized');
}

$hashValue = substr($_SERVER['HTTP_X_HUB_SIGNATURE'], 5);
$hashExpected = hash_hmac('sha1', file_get_contents('php://input'), GITHUB_WEBHOOK_SECRET_KEY);

if (hash_compare($hashValue, $hashExpected)) {
    shell_exec($updateScript);
    sendResponseAndExit(200, 'The website has been updated.');
}

sendResponseAndExit(400, 'Bad Request');

/**
 * @param int $status - the status code to exit with.
 * @param string $description - Description of what was (or was not) done.
 * @example sendResponseAndExit(403, 'Forbidden');
 *
 * Upon being called, the script will exit with exit code $status, or if $status is 200: 0.
 * ENSURE this function is the last thing you call.
 */
function sendResponseAndExit($status, $description)
{
    header('Content-Type: application/json');
    http_response_code($status);

    $data = json_encode(['status' => $status, 'description' => $description, 'time' => date('r')]);

    file_put_contents('../update.log', $data."\r\n", FILE_APPEND);

    die($status == 200 ? 0 : $status);
}

/**
 * @author http://php.net/manual/en/function.hash-hmac.php#111435
 * @param string $a Hash one to compare.
 * @param string $b Hash two to compare.
 * @return bool
 */
function hash_compare($a, $b)
{
    if (! is_string($a) || ! is_string($b)) {
        return false;
    }

    $len = strlen($a);

    if ($len !== strlen($b)) {
        return false;
    }

    $status = 0;

    for ($i = 0; $i < $len; $i++) {
        $status |= ord($a[$i]) ^ ord($b[$i]);
    }

    return $status === 0;
}
