<?php
require_once '../Database/Mysqlconnect.php';

if (isset($_POST['ip'], $_POST['port'])) {

    $sql = "CREATE TABLE IF NOT EXISTS vpss (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        ip VARCHAR(15) NOT NULL,
        port VARCHAR(15) NOT NULL,
        userip VARCHAR(15) NOT NULL,
        vptype VARCHAR(15) NOT NULL,
        ram VARCHAR(15) NOT NULL,
        cpu VARCHAR(15) NOT NULL,
        disk VARCHAR(15) NOT NULL
    )";

    $mysqlDB->exec($sql);

    $ip = $_POST['ip'];
    $port = $_POST['port'];
    $userip = $_SERVER['REMOTE_ADDR'];

    $data = [
        'ip' => $ip,
        'port' => $port,
        'userip' => $userip,
    ];

    try {
        $sql = "INSERT INTO vpss (ip, port, userip, vptype, ram, cpu, disk) VALUES (:ip, :port, :userip, :vptype, :ram, :cpu, :disk)";
        $data['vptype'] = 'linux';
        $data['ram'] = '15';
        $data['cpu'] = '75';
        $data['disk'] = '500'; 
        $stmt = $mysqlDB->prepare($sql);
        $stmt->execute($data);
        header("Location: /c/u/dashboard.php");
        echo json_encode(["message" => "MySQL: VPS connection added successfully."]);
    } catch (PDOException $e) {
        echo json_encode(["error" => "MySQL Insert failed: " . $e->getMessage()]);
        exit;
    }
} else {
    echo json_encode(["error" => "IP and Port are required.", "ip" => isset($_POST) ? $_POST : null, "port" => isset($_POST['port']) ? $_POST['port'] : null]);
}
?>