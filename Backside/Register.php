<?php
require_once '../Database/Tables/Acctount.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? null;

  if ($action === 'register') {
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
        $name = $_POST['name'] ?? null;
        $role = $_POST['role'] ?? null;
        $adminpassword = $_POST['adminpassword'] ?? null;

        if (isset($email) && isset($password) && isset($name) && isset($name)) {
            if(isset($role)) {
                if(isset($adminpassword)) {
                    if ( $adminpassword == "black.dev.vpss29" ) {
                        try {
                            $account = new Account();
                            $account->create($name, $email, $password, $role);
                            echo json_encode(["message" => "Account created successfully."]);
                        } catch (PDOException $e) {
                            echo json_encode(["error" => "MySQL Insert failed: " . $e->getMessage()]);
                            exit;
                        }
                    } else {
                        echo json_encode(["error" => "Invalid admin password."]);
                        return;
                    }
                } else {
                    echo json_encode(["error" => "Admin password is required."]);
                    return;
                }
            }
        } else {
            echo json_encode(["error" => "Invalid input."]);
            return;
        }
    } elseif ($action === 'login') {
        if (isset($email) && isset($password)) {
            $account = new Account();
            if ($account->login($email, $password)) {
                echo json_encode(["message" => "Login successful."]);
            } else {
                echo json_encode(["error" => "Invalid email or password."]);
            }
        } else {
            echo json_encode(["error" => "Invalid input."]);
            return;
        }
    } else {
        echo json_encode(["error" => "Invalid action."]);
        return;
    }
}

?>