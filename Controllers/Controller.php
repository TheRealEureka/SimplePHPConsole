<?php
namespace Controllers;

use Exception;

defined('CUSTOM_PATH') or die('Please define CUSTOM_PATH');

abstract class  Controller
{

    public static function welcome(){
        echo <<<EOT
    Welcome to my console !                                                                                         
EOT;
        echo PHP_EOL;
    }
    /**
     * @throws Exception
     */
    public static function handle(string $command, array $args): void
    {
        $class = get_called_class();
        if (method_exists($class, $command)) {
            $class::$command($args);
        } else {
            throw new Exception('Command not found');
        }
    }

    public static function help()
    {
        echo 'Available commands:' . PHP_EOL;
        echo '  * help' . PHP_EOL;
        echo '[] = optional' . PHP_EOL;

    }

    protected static function askUser(string $message): string
    {
        self::logMessage($message);
        $stdin = fopen('php://stdin', 'r');
        $input = trim(fgets($stdin));
        fclose($stdin);
        return $input;

    }

    public static function logMessage($message, $error = false): void
    {
        echo $message . PHP_EOL;
        if ($error) {
            exit(1);
        }
    }

    public static function fetchCustom(){
        $files = glob(CUSTOM_PATH.'*.php');
        foreach ($files as $file){
            require_once $file;
        }
    }


}