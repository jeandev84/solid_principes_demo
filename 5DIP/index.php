<?php

/*
D - Dependency Inversion Principe (DIP)

Принцип инверсии зависимостей
*/

interface DBConnectionInterface {
    public function connect();
}

class MySQLConnection implements DBConnectionInterface {

    public function connect() {
        // Return the MySQL connection...
    }
}

class UserDB {

    private $dbConnection;

    public function __construct(DBConnectionInterface $dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function store(User $user) {
        // Store the user into a database...
    }
}