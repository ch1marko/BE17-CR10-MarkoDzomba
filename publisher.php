<?php
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL); 

require_once './actions/db_connect.php';
$pub = $_GET["publisher_name"];
$sql = "SELECT * FROM Library WHERE publisher_name = '$pub'"; 
$result = mysqli_query($connect, $sql);

$tbody="";

if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        
        $tbody .= "
<div class = 'col-3'>
    <div class='card' style='width: 18rem;'>
        <a href='details.php?id=".$row['id']."'>
        <img src='./pic/" .$row['pic']."' class='card-img-top'>
        </a> 
            <div class='card-title'>
                <h3>Author Name : ".$row['author_first_name']."</h3>
                <a href='details.php?id=".$row['id']."'>
                <h6 class = 'title1'>Title : " .$row['title']."</h6>
                </a>
            </div>
        <a href='index.php' class='btn btn-warning'>Home</a>
    </div>
</div>    
        ";
    };
}else {
    $tbody="
        <tr>
        <td> colspan='5' class='text-center'>Not Data </td>
        </tr>
    
    ";

}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <?php require_once 'components/boot.php'?>
    <title>Publisher</title>
</head>
<body>
<div class = 'container'> 
    <div class = 'row'>
        <div class="text-center fw-bold fs-1"><?php echo $pub; ?>
        </div>
        <hr>
            <?php
                echo $tbody; 
            ?>
    </div>
</div>
</body>
</html>