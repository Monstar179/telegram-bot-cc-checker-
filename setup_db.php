<?php
$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$db   = getenv('DB_NAME');

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS users (id int(11) NOT NULL AUTO_INCREMENT, iduser bigint(20) NOT NULL, username varchar(100), firstname varchar(100), created_at timestamp DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (id), UNIQUE KEY unique_iduser (iduser));";
    $sql .= "CREATE TABLE IF NOT EXISTS creditos (id int(11) NOT NULL AUTO_INCREMENT, userdid bigint(20) NOT NULL, creditos int(11) DEFAULT 0, PRIMARY KEY (id), UNIQUE KEY unique_userdid (userdid));";

    $conn->exec($sql);
    echo "<h1>बधाई हो! PDO के जरिए डेटाबेस तैयार है।</h1>";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
