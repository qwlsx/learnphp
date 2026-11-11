<?php

namespace App;

use PDO;

class DB
{
    private $conn;

    public function __construct()
    {
        $servername = "localhost:33061";
        $username = "root";
        $password = "example";
        $dbname = "learnphp";

        $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function all(string $table, string $class)
    {
        $sql = "SELECT * FROM $table";
        $result = $this->conn->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, $class);
        return $result->fetchAll();
    }

    public function find(string $table, string $class, $id)
    {
        $sql = "SELECT * FROM $table WHERE id=$id";
        $result = $this->conn->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, $class);
        return $result->fetch();
    }

    public function where(string $table, string $class, $field, $value)
    {
        $sql = "SELECT * FROM $table WHERE $field = :value";
        $result = $this->conn->prepare($sql);
        $result->execute(['value' => $value]);
        $result->setFetchMode(PDO::FETCH_CLASS, $class);
        return $result->fetchAll();
    }

    public function insert($table, $fields)
    {
        $fieldNames = array_keys($fields);
        $fieldNamesText = implode(', ', $fieldNames);
        $fieldValuesText = implode(', ', array_fill(0, count($fields), '?'));
        $sql = "INSERT INTO $table ($fieldNamesText)
                VALUES ($fieldValuesText)";
        $statement = $this->conn->prepare($sql);
        $statement->execute(array_values($fields));
    }

    public function update($table, $fields, $id)
    {
        $updateValuesText = implode(', ', array_map(fn ($name) => "$name = ?", array_keys($fields)));
        $sql = "UPDATE $table SET $updateValuesText WHERE id = ?";
        $statement = $this->conn->prepare($sql);
        $statement->execute([...array_values($fields), $id]);
    }

    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id=$id";
        $this->conn->exec($sql);
    }
}
