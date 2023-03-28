<?php
namespace App\singleton;

class Singleton
{
    static $instance;
    public function __construct()
    {
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function info()
    {
        return [
            'name' => 'John',
            'age' => '18'
        ];
    }
}
