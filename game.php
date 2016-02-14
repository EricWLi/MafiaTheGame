<?php


	if ($_SERVER["REQUEST_METHOD"] == "GET") {
	   if (isset($_GET["start"]) && isset($_GET["gameid"])) {
		   $gameid = $_GET["gameid"];
		   startGame($gameid);
		   assignRoles($gameid);
	   }
	}
	
	function startGame($gameid) {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "mafia";

		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE mafia SET status = 1 WHERE gameid = '$gameid'";
			$conn->exec($sql);
			}
		catch(PDOException $e)
			{
			//echo $sql . "<br>" . $e->getMessage();
			}

		$conn = null;
	}
	
	function assignRoles($gameid) {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "mafia";

		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT * FROM mafia WHERE gameid = '$gameid'";
			$cnt = 0;
			foreach ($conn->query($sql) as $row) {
				$role = rand(0, 5);
				$u = $row['uuid'];
				$sql = "UPDATE mafia SET role = '$role' WHERE uuid = '$u'";
				$conn->exec($sql);
				$cnt++;
			}
			$rand = rand(0, $cnt);
			$cnt2 = 0;
			foreach ($conn->query($sql) as $row) {
				if ($cnt2 == $rand) {
					$u = $row['uuid'];
					$sql = "UPDATE mafia SET role = '1' WHERE uuid = '$u'";
					$conn->exec($sql);
				}
				$cnt2++;
			}
		}
		catch(PDOException $e)
		{
		//echo $sql . "<br>" . $e->getMessage();
		}

		$conn = null;
	}
	
	function getData($data) {
		if (!isset($_GET["uuid"]))
			return;
		
		$uuid = $_GET["uuid"];
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "mafia";

		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM mafia WHERE uuid = '$uuid'";
		$i = 1;
		
		foreach ($conn->query($sql) as $row) {
			if ($data == "name")
				return $row['name'];
			else if ($data == "role")
				return $row['role'];
		}
		$conn = null;
		return null;
	}
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>Mafia: The Game</title>
		<link rel="stylesheet" type="text/css" href="style/main.css">
		
		<script type = "text/javascript">
		
		</script>
	</head>
	
	<body>
		<div class="center">
			Hi, <?php echo getData("name"); ?>
			<br />
			You are a: 
			<?php 
				$roleArr = array("Moderator", "Mafia", "Villager", "Doctor", "Cop", "Vigilante");
				$roleImgArr = array("moderator.png", "mafia.jpg", "villager.jpg", "doctor.png", "cop.jpg", "vigilante.jpg");
				$r = getData("role");
				echo $roleArr[$r]; 
				echo "<br />";
				echo "<img height='300' width='200' src='images/" . $roleImgArr[$r] . "' />";
			?>
		</div>
	</body>
</html>