<?php namespace App\Helpers;

class Code
{
    /**
     * Fetch a payload example
     *
     * @param $file
     * @return string
     */
    public static function payload($file)
    {
        if (preg_match('/^([a-zA-Z0-9\_]+)$/', $file))
        {
            return file_get_contents(base_path().'/resources/examples/'.$file.'_payload.json');
        }

        return 'Incorrect filename';
    }

    /**
     * Fetch a response example
     *
     * @param $file
     * @return string
     */
    public static function response($file)
    {
        if (preg_match('/^([a-zA-Z0-9\_]+)$/', $file))
        {
            return file_get_contents(base_path().'/resources/examples/'.$file.'_response.json');
        }

        return 'Incorrect filename';
    }

    /**
     * Fetch a PHP example
     *
     * @param $file
     * @return string
     */
    public static function example($file)
    {
        if (preg_match('/^([a-zA-Z0-9\_]+)$/', $file))
        {
            return file_get_contents(base_path().'/resources/examples/'.$file.'_example.php');
        }

        return 'Incorrect filename';
    }
}