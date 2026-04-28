<?php
$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$db   = getenv('DB_NAME');

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

// यहाँ हम बोट के लिए टेबल बना रहे हैं
$sql = "CREATE TABLE IF NOT EXISTS users (id int(11) NOT NULL AUTO_INCREMENT, iduser bigint(20) NOT NULL, username varchar(100), firstname varchar(100), created_at timestamp DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (id), UNIQUE KEY unique_iduser (iduser));";
$sql .= "CREATE TABLE IF NOT EXISTS prmiumtime (id int(11) NOT NULL AUTO_INCREMENT, userid bigint(20) NOT NULL, timedate varchar(50) NOT NULL, created_at timestamp DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (id), UNIQUE KEY unique_userid (userid));";
$sql .= "CREATE TABLE IF NOT EXISTS creditos (id int(11) NOT NULL AUTO_INCREMENT, userdid bigint(20) NOT NULL, creditos int(11) DEFAULT 0, PRIMARY KEY (id), UNIQUE KEY unique_userdid (userdid));";

if (mysqli_multi_query($conn, $sql)) {
    echo "<h1>बधाई हो! डेटाबेस तैयार है।</h1>";
    echo "<p>अब आप इस फाइल (setup_db.php) को GitHub से डिलीट कर सकते हैं और बोट चेक कर सकते हैं।</p>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
