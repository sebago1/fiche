<?php
if (isset($_POST['fpolski']))
{
	if(!empty($_POST['fpolski']) &&!empty($_POST['famerykanski']) &&!empty($_POST['fwymowa'])){
		
		$polishFiche = $_POST['fpolski'];
		$englichFiche = $_POST['famerykanski'];
		$wymowaFiche = $_POST['fwymowa'];
		
		require_once "connect.php";
		
		// CONNECT TO MYSQL
		$connectionToData = @new mysqli($host, $db_user, $db_password, $db_name);
			if ($connectionToData->connect_errno!=0)
			{
					echo "error ".$connectionToData->connect_errno;
			}else{
				
				//SELECTING LAST ID FROM DATABASE
					$sqlSelectLastRecord = "SELECT * FROM words ORDER BY ID DESC LIMIT 1";	
					if ($resultLastRecord = $connectionToData->query($sqlSelectLastRecord))
					{
						$selectedLastRow = $resultLastRecord->fetch_assoc();
						$lastId = $selectedLastRow['id'];
					}
				$newId = $lastId + 1;
				
				$addYourFiche = "INSERT INTO `words` (`id`, `polski`, `angielski`, `wymowa`) VALUES ('$newId', '$polishFiche', '$englichFiche', '$wymowaFiche')";
				$connectionToData->query($addYourFiche);
				
				echo "<span style='color:blue;'>Dodales fiszke</span>";
				
				$connectionToData->close();
			}
		
		
	
	}else{
		echo "Jedno lub wiecej pol sa puste";
	}
}




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

	<div class="topofnav" id="jeden"><a href="sebastiangoras.pl">Sebastian Goras</a></div>
	<div class="topofnav" id="dwa"><a href="known.php">Go to KNOWN</a></div>

</div>


<div id="content">

		<form action="addword.php" method="POST">
			<div class="tabone" id="pl">Write down Polish word</div>			<div class="tabone" id="polski"><input type="text" name="fpolski"></div>
			<div class="tabtwo" id="en">Write down English word</div>			<div class="tabtwo" id="amerykanski"><input type="text" name="famerykanski"></div>
			<div class="tabthree" id="sa">Write down Pronunciation word</div>	<div class="tabthree" id="wymowa"><input type="text" name="fwymowa"></div>
			
</div>

<div class="buttons">
		
				<input type="submit" value="ADD">
		</form>
		<form action="index.php">
				<input type="submit" value="BACK">
		</form>
		
	</div>

</body>
</html>