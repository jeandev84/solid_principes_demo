<?php

/*
D - Dependency Inversion Principe (DIP)

Принцип инверсии зависимостей
*/

interface ConnectionInterface {
    public function connect();
}

class MySQLConnection implements ConnectionInterface {

    public function connect() {
        // Return the MySQL connection...
    }
}


class PostgreSQLConnection implements ConnectionInterface {

    public function connect()
    {
        // TODO: Implement connect() method.
    }
}


class SQLiteConnection implements ConnectionInterface {

    public function connect()
    {
        // TODO: Implement connect() method.
    }
}


class OracleConnection implements ConnectionInterface {

    public function connect()
    {
        // TODO: Implement connect() method.
    }
}


/**
 *
*/
class UserManager {

    private $connection;

    public function __construct(ConnectionInterface $connection) {
        $this->connection = $connection;
    }

    public function store(User $user) {
        // Store the user into a database...
    }
}