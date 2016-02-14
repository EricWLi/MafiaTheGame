<?php
	if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["name"]) && isset($_GET["gameid"]) && isset($_GET["uuid"])) {
	   $name = $_GET["name"];
	   $gameid = $_GET["gameid"];
	   $uuid = $_GET["uuid"];
	   $leader = isset($_GET["newgame"]);
	   storeDatabase($uuid, $name, $gameid);
	}
	else {
		echo "Error: Invalid request.";
	}
	
	function storeDatabase($uuid ,$name, $gameid) {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "mafia";

		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO mafia (uuid, name, gameid, role, status) VALUES ('$uuid', '$name', '$gameid', -1, 0)";
			$conn->exec($sql);
			}
		catch(PDOException $e)
			{
			//echo $sql . "<br>" . $e->getMessage();
			}

		$conn = null;
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Mafia: Game Lobby</title>
		<link rel="stylesheet" type="text/css" href="style/main.css">
		<script type="text/javascript">
			function getPlayers(uuid, gameid) {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("content").innerHTML = xmlhttp.responseText;
						setTimeout(function() { getPlayers(uuid, gameid) }, 1000);
					}
				};
				xmlhttp.open("GET", "lobby_ajax.php?uuid=" + uuid + "&gameid=" + gameid, true);
				xmlhttp.send();
			}
		</script>
	</head>
	
	<body>
		<h1>Mafia Game Lobby</h1>
		<div class="center2">
		Game ID: <?php echo $gameid; ?>
		<hr />
		Player List:
			<div id="content">
			</div>
			
			<?php if ($leader) echo "<a href='game.php?start=true&uuid=$uuid&gameid=$gameid'><button>Start Game</button></a>"; ?>
		</div>
		
		<script type="text/javascript">
			getPlayers("<?php echo strip_tags($uuid) . '", "' . strip_tags($gameid); ?>");
		</script>
	</body>
</html>