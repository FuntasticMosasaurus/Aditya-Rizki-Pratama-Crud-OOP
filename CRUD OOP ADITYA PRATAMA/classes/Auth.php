<?php
require_once 'User.php';

class Auth extends User {
    public function register($name, $username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        return $this->create([
            'name' => $name,
            'username' => $username,
            'password' => $hashedPassword
        ]);
    }
}
?>

