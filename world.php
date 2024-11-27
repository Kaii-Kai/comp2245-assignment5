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
		
		if (results) {
			echo "<table>";
			echo "<tr>
					<th>Country Name</th>
					<th>Continent</th>
					<th>Independence Year</th>
					<th>Head of State</th>
				</tr>";
			
			foreach ($results as $row) {
				echo "<tr>
						<td>".htmlspecialchars(row['name']). "</td>
						<td>".htmlspecialchars(row['continent']). "</td>
						<td>".htmlspecialchars(row['independence_year']). "</td>
						<td>".htmlspecialchars(row['head_of_state']). "</td>
					</tr>";
			}
			echo "</table>";
		}
	}
} catch (Exception $e) {
	die($e -> getMessage());
}
?>