<?php
			$losId = $_POST['sendId'];
			$losPl = $_POST['sendPl'];
			$losEn = $_POST['sendEn'];
			$losWy = $_POST['sendWy'];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="description" content="Free Game Learn English">
<meta name="keywords" content="Learn English">
<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>

<body>

		<div id="navi">


			<div class="topofnav" id="jeden">
			<a href="sebastiangoras.pl">Sebastian Goras</a></div>
			<div class="topofnav" id="dwa"><a href="known.php">Go to KNOWN</a></div>

		</div>

		<div id="question">

			DO YOU WANT TO SEND THIS WORD TO "KNOWN" DATA BASE?

		</div>
		

		<div class="buttons">
				
					<form action="move_to_know.php" method="post">
							<input type="hidden" name="sendId" value="<?php echo $losId ?>">
							<input type="hidden" name="sendPl" value="<?php echo $losPl ?>">
							<input type="hidden" name="sendEn" value="<?php echo $losEn ?>">
							<input type="hidden" name="sendWy" value="<?php echo $losWy ?>">
							<input type="submit" value="YES">
					</form>
					<form action="index.php">
							<input type="submit" value="NO">
					</form>
		</div>
		
</body>
</html>