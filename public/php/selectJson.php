<?php
header('Content-Type: application/json');
require_once 'config.php';

try{     
	
    $sql = "select id,event_name,event_date,event_detail,event_picture from event";
    if(isset($_POST['event_name'])){
  $event_name=$_POST['event_name'];
  $event_date=$_POST['event_date'];
        $sql.="  where event_name=:event_name";
        $sql.="  where event_date=:event_date";
  }
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':event_name', $event_name, PDO::PARAM_STR);
    $stmt->bindParam(':event_date', $event_date, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $arrData=array();
        while($row = $stmt->fetch()){
            $arrRows['id']=$row['id'];
            $arrRows['event_name']=$row['event_name'];  
            $arrRows['event_date']=$row['event_date'];
             
			array_push($arrData, $arrRows);
            
        }	
        echo json_encode($arrData);
        unset($stmt);
    } else{
        echo "No records matching your query were found.";
    }
 
} catch(PDOException $e){
    die("ERROR: Could not prepare/execute query: $sql. " . $e->getMessage());
}
?>