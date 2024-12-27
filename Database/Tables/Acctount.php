<?php

require_once '../Database/Mysqlconnect.php';

// Create the accounts table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS accounts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL,
    last_login DATETIME
)";

if ($mysqlDB->query($sql) !== TRUE) {
    echo "Error creating table: " . $mysqlDB->error;
}



class Account {
    public $id;
    public $name;
    public $email;
    public $password;
    public $last_login;
    public $role;

    public function create($name, $email, $password, $role) {
        global $mysqlDB;

        $passwordPattern = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/';
        if (!preg_match($passwordPattern, $password)) {
            echo json_encode(["error" => "Password must be at least 6 characters long and contain at least one letter and one number."]);
            return;
        }

        $emailPattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        if (!preg_match($emailPattern, $email)) {
            echo json_encode(["error" => "Invalid email format."]);
            return;
        }

        if ($this->emailExists($email)) {
            echo json_encode(["error" => "Email already exists."]);
            return;
        }

        if (!$this->validateInput($name, $email, $password, $role)) {
            echo json_encode(["error" => "Invalid input."]);
            return;
        }

        $this->name = $name;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
        $this->role = $role;
        $this->last_login = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));

        $insertSql = "INSERT INTO accounts (name, email, password, role, last_login) VALUES (?, ?, ?, ?, ?)";
        $stmt = $mysqlDB->prepare($insertSql);
        $stmt->execute([$name, $email, $this->password, $role, $this->last_login]);
        $this->id = $mysqlDB->lastInsertId();
    }

    private function emailExists($email) {
        global $mysqlDB;

        $sql = "SELECT * FROM accounts WHERE email = ?";
        $stmt = $mysqlDB->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    }

    private function validateInput($name, $email, $password, $role) {
        return !empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL) && 
               strlen($password) >= 6 && !empty($role);
    }


    public function login($email, $password) {
        global $mysqlDB;

        $sql = "SELECT * FROM accounts WHERE email = ?";
        $stmt = $mysqlDB->prepare($sql);
        $stmt->execute([$email]);
        $account = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($account && password_verify($password, $account['password'])) {
            $this->id = $account['id'];
            $this->name = $account['name'];
            $this->email = $account['email'];
            $this->password = $account['password'];
            $this->role = $account['role'];
            $this->last_login = DateTime::createFromFormat('Y-m-d H:i:s', $account['last_login']);
            return true;
        } else {
            echo json_encode(["error" => "Invalid email or password."]);
            return;
        }
    }   
}
?>