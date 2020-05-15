<?php
class Application {
    private static $instance;
    private function __construct()
    {
    }

    public static function getInstance() {
        if (self::$instance === NULL) {
            self::$instance = new Application();
            echo "Hello World";
        }
        return self::$instance;
    }
}
$app1 = Application::getInstance();

