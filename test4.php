<?php
include 'config/app.php';
session_start();

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Cek apakah username ada di database
        $stmt = $conn->prepare("SELECT id, password, username FROM tbUserID WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Login berhasil
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.php");
            exit;
        } else {
            // Login gagal
            $_SESSION['failed_login'] = true;
            header("Location: login.php");
            exit;
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
