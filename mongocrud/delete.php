<?php
 require '../vendor/autoload.php';
 $con = new MongoDB\Client("mongodb://localhost:27017");
//   echo "connection Successful";
// create databasee 
$db = $con->Crud;
// after that we are create table 
$tbl = $db->employee;

if(isset($_GET['id'])){
    $id_data = $_GET['id'];
    // echo $id_data."welcome";
    
    
    
     


echo $id_data;
if($deleteResult = $tbl->deleteOne(['emailid' => $id_data])==true){
    echo "done";
     header('Location: insertData.php');
}
else{
    echo "not done";
}
}


?>
