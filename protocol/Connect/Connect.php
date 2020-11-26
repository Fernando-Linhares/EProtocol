<?php

class Connect
{
    private const HOST = 'localhost';
    private const USER = 'fernando';
    private const PASSWORD = '321Fer123';
    private const DB = "protocol";
    private const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8",
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
        PDO::ATTR_CASE=>PDO::CASE_NATURAL
    ];
    private static $instance;

    public function getInstance()
    {
        if(empty(self::$instance)):
            self::$instance = new PDO(
                "mysql:host=".self::HOST.";dbname=".self::DB,
                self::USER,
                self::PASSWORD,
                self::OPTIONS
            );
        endif;

        return self::$instance;
    }
    final private function __clone()
    {
        
    }
    final private function __construct()
    {

    }
}