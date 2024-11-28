<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';


try{
	$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
	
	if (isset($_GET['country'])) {
		$country = $_GET['country'];
		$lookup = $_GET['lookup'] ?? 'countries';
		
		if($lookup === 'cities'){
		
			$stmt = $conn->prepare("SELECT cities.name AS city_name, cities.district, cities.popuation FROM cities
									JOIN countries ON cities.country_code = countries.code WHERE countries.name LIKE "%$country%" ");
		} else {
			$stmt = $conn->prepare("SELECT name, continent, independence_year, head_of_state FROM countries WHERE name LIKE "%$country%" ");
		}
			
		$stmt->execute();

		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		if ($results) {
			if ($lookup === "cities") {
				echo "<table>;
					<tr>
						<th>Name</th>
						<th>District</th>
						<th>Population</th>
					</tr>";
				
				foreach ($results as $row) {
					echo "<tr>
							<td>".htmlspecialchars($row['name']). "</td>
							<td>".htmlspecialchars($row['district']). "</td>
							<td>".htmlspecialchars($row['population']). "</td>
						</tr>";
				}
				echo "</table>";
			} else {
				echo "<table>
					<tr>
						<th>Country Name</th>
						<th>Continent</th>
						<th>Independence Year</th>
						<th>Head of State</th>
					</tr>";
				
				foreach ($results as $row) {
					echo "<tr>
							<td>".htmlspecialchars($row['name']). "</td>
							<td>".htmlspecialchars($row['continent']). "</td>
							<td>".htmlspecialchars($row['independence_year']). "</td>
							<td>".htmlspecialchars($row['head_of_state']). "</td>
						</tr>";
				}
				echo "</table>";
			}
		}
	}
} catch (Exception $e) {
	die($e -> getMessage());
}
?>