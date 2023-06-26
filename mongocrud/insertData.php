<?php
  require '../vendor/autoload.php';
  $con = new MongoDB\Client("mongodb://localhost:27017");
//   echo "connection Successful";
// create databasee 
$db = $con->Crud;
// after that we are create table 
$tbl = $db->employee;
 
if(isset($_POST["submit"])){
    $email_id = $_POST['email'];
    $password = $_POST['password'];

  $tbl->insertOne(["emailid" =>$email_id, "password"=>$password]);
  echo "data is inserted";
}

$data = $tbl->find();





?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="container">
        <div class="row">
          <table>
            <thead>
              <tr>
                <td>Email</td>
                <td>Password</td>
                <td>Action</td>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($data as $value)
              {
              ?>
              <tr>
                <td><?php echo $value['emailid']  ?></td>
                <td><?php echo $value['password']  ?></td>
                <td>
                  <form action="delete.php?id=<?php echo $value['emailid']; ?>" method="post">
                  <a href=""><button class="btn btn-danger">Delete</button></a> </form>
                  <a href=""><button class="btn btn-primary">Edit</button></a>
                 

                </td>
              </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

<?php


?>