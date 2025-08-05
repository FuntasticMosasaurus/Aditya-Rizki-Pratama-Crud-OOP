<?php
require_once 'DB.php';

class User extends DB {

    public function getAllUsers() {
        $conn = $this->connect();
        $result = $conn->query("SELECT * FROM users");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserById($id) {
        $conn = $this->connect();
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($data) {
        $conn = $this->connect();
        $stmt = $conn->prepare("INSERT INTO users (name, username, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $data['name'], $data['username'], $data['password']);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $conn = $this->connect();
        $stmt = $conn->prepare("UPDATE users SET name = ?, username = ?, password = ? WHERE id = ?");
        $stmt->bind_param("sssi", $data['name'], $data['username'], $data['password'], $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $conn = $this->connect();
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>