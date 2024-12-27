<?php
require_once '../Database/Mysqlconnect.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        $sql = "DELETE FROM vpss WHERE id = :id";
        $stmt = $mysqlDB->prepare($sql);
        $stmt->execute(['id' => $id]);
        header("Location: /c/u/dashboard.php");
        echo json_encode(["message" => "Connection deleted successfully."]);
    } catch (PDOException $e) {
        echo json_encode(["error" => "MySQL Delete failed: " . $e->getMessage()]);
        exit;
    }
} else {
    echo json_encode(["error" => "ID is required."]);
}
?>