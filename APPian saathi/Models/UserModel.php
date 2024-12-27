<?php
require_once 'config/config.php';

class UserModel {
    private $db;

    public function __construct() {
        $this->db = connectDatabase();
    }

    // Register a new user
    public function registerUser($name, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $hashedPassword);
        if ($stmt->execute()) {
            return $this->db->insert_id; // Return the inserted user ID
        } else {
            throw new Exception("Error registering user: " . $stmt->error);
        }
    }

    // Verify user login
    public function verifyUser($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            return $user; // Return user details if password matches
        } else {
            return false; // Invalid credentials
        }
    }
}
?>
