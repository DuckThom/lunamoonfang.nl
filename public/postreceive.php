<?php
error_reporting(0);
ini_set('display_errors', 0);

$url		= (isset($_POST['canon_url']) ? $_POST['canon_url'] : false);
$user 		= (isset($_POST['user']) ? $_POST['user'] : false);

// Script to call that will update our website.
// Be wary: this is shell_exec()'d. For the safety of the system, it may only call an existing executable file.
$updateScript = '../update.sh';

// Check if our update script exists, and is executable.
if (!file_exists($updateScript) || !is_executable($updateScript))
{
    sendResponseAndExit(500, 'Internal Server Error');
}

if ($_SERVER['REMOTE_ADDR'] === '131.103.20.165' || $_SERVER['REMOTE_ADDR'] === '131.103.20.166') {
    shell_exec($updateScript);
    sendResponseAndExit(200, "The website has been updated.");
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

    $data = json_encode(array('status' => $status, 'description' => $description, 'time' => date('r')));
    
    file_put_contents("../update.log", $data . "\r\n", FILE_APPEND);
    
    die($status == 200 ? 0 : $status);
}