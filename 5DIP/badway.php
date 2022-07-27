<?php

class UserManager
{
    private $connection;

    public function __construct(MySQLConnection $connection) {
        $this->connection = $connection;
    }

    public function store(User $user) {
        // Store the user into a database...
    }
}


class MySQLConnection {

     public function connect()
     {

     }
}