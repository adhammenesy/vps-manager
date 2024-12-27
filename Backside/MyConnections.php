<?php
require_once '../Database/Mysqlconnect.php';

$userip = $_SERVER['REMOTE_ADDR'];
if (isset($userip)) {
    try {



        $sql = "SELECT * FROM vpss WHERE userip = :userip";
        $stmt = $mysqlDB->prepare($sql);
        $stmt->execute(['userip' => $userip]);
        $vpss = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($vpss);
    } catch (PDOException $e) {
        echo json_encode(["error" => "MySQL Select failed: " . $e->getMessage()]);
        exit;
    }
}
?>