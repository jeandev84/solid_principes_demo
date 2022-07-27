<?php

class UserDB {

    private $dbConnection;

    public function __construct(MySQLConnection $dbConnection) {
        $this->dbConnection = $dbConnection;
    }

    public function store(User $user) {
        // Store the user into a database...
    }
}


class MySQLConnection {

}