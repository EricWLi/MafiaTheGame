<?php
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
	   $gameid = $_GET["gameid"];
	   $uuid = $_GET["uuid"];
	   getPlayers($gameid, $uuid);
	}

	function getPlayers($gameid, $uuid) {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "mafia";

		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT name, status FROM mafia WHERE gameid = '$gameid'";
		$i = 1;
		foreach ($conn->query($sql) as $row) {
			$status = "";
			if ($row['status'] == 0)
				$status = "Waiting";
			else
				$status = "Game Starting";
			echo $i . ": " . $row['name']." | Status: " . $status . "<br />";
			$i++;
		}
		$conn = null;
		
		if ($status == "Game Starting")
			echo "<a href='game.php?uuid=".$uuid."&gameid=$gameid'><button>Start Game</button></a>";
	}
	
?>