<?php

require_once './actions/db_connect.php';

$sql = "SELECT * FROM library WHERE id = $_GET[id]";
$result = mysqli_query($connect, $sql);

$tbody="";

if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        $tbody .= "
        
<div class='row'>
    <div class='card h-100 w-100' style='width: 18rem;'>
    <img src='./pic/".$row['pic']."' class='card-img-top'>
        <div class='card-body h-100'>
            <div class='col-12'>
                <h1>
                    ".$row['title']."
                </h1>
                <hr>
            </div>
            <div class='col-12 m-4'>
                <p class='card-text'>
                <span class='fw-bolder'>Description:</span>
                <br>
                    ".$row['short_description']."
                </p>
            </div>
            <div class='col-12 m-4'>
                <p class='card-text'> 
                <span class='fw-bolder'>ISBN code:</span>".$row['isbncode']."
                </p>
                <p class='card-text'>  
                <span class='fw-bolder'>Author:</span> ".$row['author_first_name']."
                    ".$row['author_last_name']."
                </p>
                
                <p class='card-text'> 
                <span class='fw-bolder'>Status:</span> ".$row['status']."
                </p>
            </div>
            <div class='col-12 m-4'>
                <p class='card-text'> <a href='publisher.php?publisher_name=".$row['publisher_name']."'>
                    Publisher: ".$row['publisher_name']."</a>
                </p>
                <p class='card-text'> 
                    <span class='fw-bolder'>Address:</span> ".$row['publisher_address']."
                </p>
                <p class='card-text'> 
                <span class='fw-bolder'>Publish:</span>  ".$row['publish_date']."
                </p>
            </div>
            <div class='col-12 m-4'>
            <a href='update.php?id=".$row['id']."'><button class='btn btn-primary'>Update</button></a>
            <a href='delete.php?id=".$row['id']."'><button class='btn btn-danger' >Delete</button></a>
            <a href='index.php?id=".$row['id']."'><button class='btn btn-warning'>Back</button></a>
            </div>
        </div>
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
    <?php require_once 'components/boot.php'?>
    <title>Details</title>
</head>
<body>
    <div class="container">   
        <?php  
            echo $tbody;
        ?>   
    </div>

</body>
</html>