<?php

use Symfony\Component\Dotenv\Dotenv;

final class Environment
{
    public static function get()
    {
        try {
            $dotenv = new Dotenv();
            $dotenv->load('../.env');

            return (object) [
                'db_host' => $_ENV['DB_HOST'],
                'db_user' => $_ENV['DB_USER'],
                'db_pass' => $_ENV['DB_PASS'],
                'db_name' => $_ENV['DB_NAME'],
                'db_port' => $_ENV['DB_PORT'],
            ];
        } catch (Exception $e) {
            echo "Error al cargar el archivo .env: " . $e->getMessage();
            return null;
        }
    }
}
