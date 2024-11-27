<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';


try{
	$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
	
	if (isset($_GET['country'])) {
		$country = $_GET['country'];
		
	$stmt = $conn->prepare("SELECT * FROM countries WHERE name LIKE '%$country%'");
	$stmt->execute();

	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	} else {
		$results = [];
	}
} catch (Exception $e) {
	die($e -> getMessage());
}


?>
<ul>
<?php if (!empty($results)):?>
	<?php foreach ($results as $row): ?>
		<li><?= htmlspecialchars($row['name']) . ' is ruled by ' . htmlspecialchars($row['head_of_state']); ?></li>
	<?php endforeach; ?>
<?php else: ?>
	<li>No results found.</li>
<?php endif; ?>
</ul>
