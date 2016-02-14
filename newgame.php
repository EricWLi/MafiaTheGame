<?php
	function randId($length) {
		$characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$rand = "";
		for ($i = 0; $i < $length; $i++) {
			$rand .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $rand;
	}
	
	$gameid = randId(6);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>New Game</title>
		<link rel="stylesheet" type="text/css" href="style/main.css">
		
		<script type = "text/javascript">
		
		</script>
	</head>
	
	<body>
		<div class = "center">
			<div>
			<h2>New Game Created</h1>
			Your code is:
			<?php
				echo $gameid;
			?>
			
			<br />
			
			<form action = "lobby.php">
				<span>Name:
					<input type="text" name="name" />
					<input type="hidden" name="gameid" value="<?php echo $gameid ?>">
					<input type="hidden" name="uuid" value="<?php echo randId(16); ?>">
					<input type="hidden" name="newgame" value="true">
				</span>
				<br />
				<input class="button "type="submit" value="Join Game" />
			</form>
			</span>
			
		</div>
	</body>
</html>
