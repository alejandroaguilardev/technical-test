<?php
declare (strict_types = 1);

class Database
{
    private $connection;

    public function __construct(
        readonly private string $host,
        readonly private string $username,
        readonly private string $password,
        readonly private string $database,
        readonly private string $port
    ) {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->database;port=$this->port";
            $this->connection = new PDO($dsn, "root", $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function close()
    {
        $this->connection = null;
    }
}
