<?php
class Players {
    private $conn;

    // Constructor 
    function __construct($host, $dbname, $username, $password) {
        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    // INSERT
    function insert($table, $data) {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));

        $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $this->conn->prepare($query);

        return $stmt->execute($data);
    }

    // SELECT with pins params
    function select($table, $columns = "*", $conditions = null, $params = []) {
        $query = "SELECT $columns FROM $table";
        if ($conditions) {
            $query .= " WHERE $conditions";
        }

        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // UPDATE
    function update($table, $data, $conditions, $params = []) {
        $fields = [];
        foreach ($data as $key => $value) {
            $fields[] = "$key = :$key";
        }
        $fieldsString = implode(", ", $fields);

        $query = "UPDATE $table SET $fieldsString WHERE $conditions";
        $stmt = $this->conn->prepare($query);

        return $stmt->execute(array_merge($data, $params));
    }

    // DELETE with pins params
    function delete($table, $conditions, $params = []) {
        $query = "DELETE FROM $table WHERE $conditions";
        $stmt = $this->conn->prepare($query);

        return $stmt->execute($params);
    }
}
?>