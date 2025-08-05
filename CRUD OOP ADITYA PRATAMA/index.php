<?php

require_once 'classes/Auth.php';

$auth = new Auth("localhost", "root", "", "student_2025");


$auth->register("Aditya", "MOSASAUR", "rahasia");


echo "<h3>Data Semua User</h3>";
$data = $auth->getAllUsers();
echo "<pre>";
print_r($data);
echo "</pre>";


$auth->update(1, [
    'name' => 'Aditya Diperbarui',
    'username' => 'aditya_updated',
    'password' => password_hash('baru123', PASSWORD_BCRYPT)
]);


$auth->delete(2);
?>