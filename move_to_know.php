<?php 

class MoveToKnown
{
	function saveSelectedRecordToKnownDataBase()
	{
		require "connect.php";
		
		try{
		
			$connectionToData = new mysqli($host, $db_user, $db_password, $db_name);
				if ($connectionToData->connect_errno!=0)
				{
						echo "error ".$connectionToData->connect_errno;
						
				}else
				{	
					//SELECTING LAST RECORD FROM DATABASE
					$sqlSelectLastRecord = "SELECT * FROM known ORDER BY ID DESC LIMIT 1";	
					if ($resultLastRecord = $connectionToData->query($sqlSelectLastRecord))
					{
						$selectedLastRow = $resultLastRecord->fetch_assoc();
						
						$lastId = $selectedLastRow['id'];
					}else{
						echo "Dev information: Issue to connect with KNOWN table";
					}
					$lastId ++; 
					$selectedPlZmienna = $_POST['sendPl'];
					$selectedEnZmienna = $_POST['sendEn'];
					$selectedWyZmienna = $_POST['sendWy'];


					$sqlSaveToDataBase = "INSERT INTO `known` (`id`, `polski`, `angielski`, `wymowa`) VALUES ('$lastId', '$selectedPlZmienna', '$selectedEnZmienna', '$selectedWyZmienna')";			
					$connectionToData->query($sqlSaveToDataBase);
					$connectionToData->close();		
				
					
				}
		}
		catch(Exception $e)
        {
            echo '<span style="color:red;">Błąd serwera!</span>';
            echo '<br />Informacja developerska: '.$e;
        }
	}
	
	function deleteSelectedRecordFromDB()
	{
		require "connect.php";
		
		try{
		
			$connectionToData = new mysqli($host, $db_user, $db_password, $db_name);
				if ($connectionToData->connect_errno!=0)
				{
						echo "error ".$connectionToData->connect_errno;
						
				}else
				{	
					$selectedIdZmienna = $_POST['sendId'];
					
					$sqlSaveToDataBase = "DELETE FROM `words` WHERE `words`.`id` = '$selectedIdZmienna'";			
					$connectionToData->query($sqlSaveToDataBase);
					$connectionToData->close();					
				}
		}
		catch(Exception $e)
        {
            echo '<span style="color:red;">Błąd serwera!</span>';
            echo '<br />Informacja developerska: '.$e;
        }
	}
	
	function moveLastRecordToSelectedRecordAndDeleteLast()
	{
		require "connect.php";
		
		// CONNECT TO MYSQL
		$connectionToData = @new mysqli($host, $db_user, $db_password, $db_name);
			if ($connectionToData->connect_errno!=0)
			{
					echo "error ".$connectionToData->connect_errno;
			}else
			{
				//SELECTING LAST RECORD FROM DATABASE
					$sqlSelectLastRecord = "SELECT * FROM words ORDER BY ID DESC LIMIT 1";	
					if ($resultLastRecord = $connectionToData->query($sqlSelectLastRecord))
					{
						$selectedLastRow = $resultLastRecord->fetch_assoc();
						
						$lastId = $selectedLastRow['id'];
						$lastPl = $selectedLastRow['polski'];
						$lastEn = $selectedLastRow['angielski'];
						$lastWy = $selectedLastRow['wymowa'];
						
						$suitablId = $_POST['sendId'];
						
						$sqlInsert = "INSERT INTO `words` (`id`, `polski`, `angielski`, `wymowa`) VALUES ('$suitablId', '$lastPl', '$lastEn', '$lastWy')";
						if($resultOfInsert = $connectionToData->query($sqlInsert))
						{
							$sqlDeleteLast = "DELETE FROM `words` WHERE `words`.`id` = '$lastId'";
							$connectionToData->query($sqlDeleteLast);
							
							echo "DONE3";
						}else{
							echo "Something was wrong";
						}

					}	
		$connectionToData->close();		
echo "moveLastRecordToSelectedRecordAndDeleteLast";
			}
	}
	
}
	

				$move = new MoveToKnown;
					$move->saveSelectedRecordToKnownDataBase();
					$move->deleteSelectedRecordFromDB();
					$move->moveLastRecordToSelectedRecordAndDeleteLast();
					header('Location: index.php');
					
?>