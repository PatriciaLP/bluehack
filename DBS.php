<!doctype html>
<html>
<head>
  <title>BlueHACK DataBase RESULT</title>
</head>

<body>
  <h1>BlueHACK DataBase RESULT</h1>
  <?php
    $searchname=trim($_POST['Hackname']);

    if(!$searchname) {
      echo 'You have not insert name.'
      exit;
    }
    $db = new mysqli('localhost','Hawk','Hack0805!','HackInfo');

    if(mysqli_connect_errno()) {
      echo 'Error : Could not connect DataBase.';
      exit;
    }
    $query = "SELECT CODE,name,city FROM HackInfo";
    $stmt = $db -> prepare($query);
    $stmt -> bind_param('s',$searchname);
    $stmt -> execute();

    $stmt -> bind_result($CODE,$name,$city);

    whlie($stmt->fetch()) {
      echo 'CODE : ".$CODE"';
      echo 'name : ".$name"';
      echo 'city : ".$city"';
    }
    $stmt -> free_result();
    $db -> close();
   ?>
 </body>
 </html>
