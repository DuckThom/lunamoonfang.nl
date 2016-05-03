<?php namespace App;

class Helper
{

    /**
     * Generate a hash
     *
     * @param int $minlength
     * @param int $maxlength
     * @return string
     * @throws \Exception
     */
    public static function createHash($minlength = 5, $maxlength = 10)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!';
        $hash  = '';
        $count = 0;

        // Run until the end of times
        while ($count < $minlength) {
            $hash .= $chars[rand(0, strlen($chars)-1)];

            $count++;

            if ($count === 5) {
                // Retry until the limit is 10
                if ($minlength === $maxlength) {
                    throw new \Exception('Exhausted possible hashes...?');
                }

                // Restart the loop if the hash is not unique
                if (file_exists(public_path() . "/img/" . $hash)) {
                    $minlength++;
                    $count = 0;
                    $hash = '';
                }
            }
        }

        return $hash;
    }

}