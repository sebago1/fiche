<?php
class Losowanie
{
	//public $id;
	//public $polish;
	//public $english;
	//public $pronunciation;
	
	function drawLosowanie(){
	
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
					
					//RANDOM NUMBER
					$drawnNumber = rand(1, $lastId);
					
					//SELECT ID OF DRAW NUMBER
					$sqlSelectDrawnId = "SELECT * FROM words WHERE id='$drawnNumber'";
					if ($result = $connectionToData->query($sqlSelectDrawnId)){
						
						$selectedDrawnRow = $result->fetch_assoc();
						$this->id = $selectedDrawnRow['id'];
						$this->polish = $selectedDrawnRow['polski'];
						$this->english = $selectedDrawnRow['angielski'];
						$this->pronunciation = $selectedDrawnRow['wymowa'];
																		
					}
					$connectionToData->close();
			}
	}
	
	function getId(){
		return $this->id;
	}
	function getPolski(){
		$word = $this->polish;
		$word = strtoupper($word);
		return $word;
	}
	function getAngielski(){
		$word = $this->english;
		$word = strtoupper($word);
		return $word;
	}
	function getWymowa(){
		$word = $this->pronunciation;
		$word = strtoupper($word);
		return $word;
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

<?php 

$los = new Losowanie;
$los->drawLosowanie();

$losId = $los->getId();
$losPl = $los->getPolski();
$losEn = $los->getAngielski();
$losWy = $los->getWymowa();

?>

<div id="navi">


	<div class="topofnav" id="jeden">
	<a href="sebastiangoras.pl">Sebastian Goras</a></div>
	<div class="topofnav" id="dwa"><a href="known.php">Go to KNOWN</a></div>

</div>
<div id="container">
	<div id="content">

			<div class="borderClass" id="pl">Polish</div>			<div class="borderClass" id="polski"><?php echo $losPl ?></div>			<div class="borderClass" id="polskiHidden">===</div>
			
			<button onclick="startMePl()">HIDE/SHOW</button>
			
			<div class="borderClass" id="en">English</div>			<div class="borderClass" id="amerykanski"><?php echo $losEn ?></div>	<div class="borderClass" id="englishiHidden">===</div>
			<div class="borderClass" id="sa">Pronunciation</div>	<div class="borderClass" id="wymowa"><?php echo $losWy ?></div> 		<div class="borderClass" id="pronHidden">===</div>
			
			<button onclick="startMeEn()">HIDE/SHOW</button>
	</div>
	

	<div class="buttons">
			<form action="index.php">
					<input type="submit" value="DRAW">
			</form>
			<form action="addword.php">
					<input type="submit" value="ADD WORD">
			</form>
			<div id="deletewordbtn">
				<form action="confirm.php" method="post">
						<input type="hidden" name="sendId" value="<?php echo $losId ?>">
						<input type="hidden" name="sendPl" value="<?php echo $losPl ?>">
						<input type="hidden" name="sendEn" value="<?php echo $losEn ?>">
						<input type="hidden" name="sendWy" value="<?php echo $losWy ?>">
						<input type="submit" value="SEND TO KNOWN">
				</form>
			</div>
	</div>
</div>
<script src="script.js"></script>
</body>
</html>