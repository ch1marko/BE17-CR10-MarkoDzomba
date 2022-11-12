<?php
require_once 'actions/db_connect.php';

if (isset($_GET["type"])) {
    $type = $_GET["type"];

    $sql = "SELECT * FROM library WHERE type = '$type'";
    $result = mysqli_query($connect, $sql);
    $body = "";
    if (mysqli_num_rows($result) == 0) {
        $body = "No results";
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $body .= "
            <div class='card shadow p-3 mb-5' style='width: 18rem;'>
                <img src='pic/" .$row['pic']."' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>" .$row['title']."</h5>
                    <p class='card-text'><span class='fw-bolder'>Type :</span> " .$row['type']."</p>
                    <p class='card-text'><span class='fw-bolder'>Description :</span> ".$row['']."</p>
                    <a href='update.php?id=" .$row['id']."'><button class='btn btn-primary btn-sm' type='button'>Update</button></a>
                    <a href='details.php?id=" .$row['id']."'><button class='btn btn-warning btn-sm' type='button'>Details</button></a>
                    <a href='delete.php?id=" .$row['id']."'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a>
                </div>
            </div>
";
        }
    }
} else {

    $sql = "SELECT * FROM library";
    $result = mysqli_query($connect, $sql);
    $body = "";
    if (mysqli_num_rows($result) == 0) {
        $body = "No results";
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $body .= "
            <div class='card shadow p-3 mb-5' style='width: 18rem;'>
                <img src='pic/" .$row['pic']."' class='card-img-top' alt='...'>
                <div class='card-body'>
                    <h5 class='card-title'>" .$row['title']."</h5>
                    <p class='card-text'><span class='fw-bolder'>Type :</span> " .$row['type']."</p>
                    <p class='card-text'><span class='fw-bolder'>Description :</span> ".$row['short_description']."</p>
                    <a href='update.php?id=" .$row['id']."'><button class='btn btn-primary btn-sm' type='button'>Update</button></a>
                    <a href='details.php?id=" .$row['id']."'><button class='btn btn-warning btn-sm' type='button'>Details</button></a>
                    <a href='delete.php?id=" .$row['id']."'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a>
                </div>
            </div>
";
        }
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sort</title>
    <?php require_once 'components/boot.php'?>

</head>

<body>


<div class="container p-5">
    <div class = 'row'>
        <div class='mb-3 col-auto mr-auto'>
            <a href= "index.php"><button class='btn btn-info'type="button" >Home</button></a>
        </div>
        <div class="dropdown col-auto">
            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Sort
            </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="sort.php">All</a></li>
                    <li><a class="dropdown-item" href="sort.php?type=book">Book</a></li>
                    <li><a class="dropdown-item" href="sort.php?type=cd">CD</a></li>
                    <li><a class="dropdown-item" href="sort.php?type=dvd">DVD</a></li>
                </ul>
        </div>
    </div>
</div>


    <div class="container">
        <div class="row rows-col-lg-4 rows-col-md-2 rows-col-sm-1 gap-3">
            <?= $body ?>
        </div>
    </div>

</body>

</html>