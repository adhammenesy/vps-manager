<?php
require_once '../Database/Mysqlconnect.php';
require_once __DIR__ . '/../vendor/autoload.php'; 
use phpseclib3\Net\SSH2;

if (!isset($_GET['vps_id'], $_GET['username'], $_GET['password'])) {
    echo json_encode(["error" => "Invalid input."]);
    return;
}

$sql = "SELECT * FROM vpss WHERE id = ?";
$stmt = $mysqlDB->prepare($sql);
$stmt->execute([$_GET['vps_id']]);
$vps = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$vps) {
    echo json_encode(["error" => "VPS not found."]);
    return;
}

$vps_ip = $vps['ip'];
$username = $_GET['username'];
$password = $_GET['password'];

try {
    $ssh = new SSH2($vps_ip);
    if (!$ssh->login($username, $password)) {
        throw new Exception('Login Failed');
    }
    $output = $ssh->exec('ls -la');
    echo "Command Output:\n$output";
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>