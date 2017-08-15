<?php

class Model
{
    private $dbh;
    private $error;
    private $stmt;
    // Set Constructor
    public function __construct()
    {
        // Set DSN - database source
        $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.'';
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE    => PDO::ERRMODE_EXCEPTION
        );
        // Create new PDO
        try {
            $this->dbh = new PDO($dsn, DB_USER, DB_PASS, $options);
            //echo 'Conn Working<br>';
        } catch(PDOException $e) {
            echo $this->error = $e->getMessage();
        }
    }
    // Set QUERY Function
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }
    // Set BIND VALUE function - check type of data,is_int,is_bool,is_null or string
    public function bind($param, $value, $type = null)
    {
        if(is_null($type))
        {
            switch(true)
            {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        // Function bindValue() - vezuje vrednost parametra
        $this->stmt->bindValue($param, $value, $type);
    }
    // Set EXECUTE function
    public function execute()
    {
        return $this->stmt->execute();
    }
    // Set lastInsertId() - vraća nam poslednji definisani id u bazi
    public function lastInsertId(){
        return $this->dbh->lastInsertId();
    }
    // Set RESULT function
    public function resultset()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    // set single result
    public function singleRes()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
}