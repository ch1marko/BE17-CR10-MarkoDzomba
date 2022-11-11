<?php
require_once './actions/db_connect.php';


$sql = "SELECT * FROM products";
$result = mysqli_query($connect, $sql);
$tbody = ''; //this variable will hold the body for the table
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $tbody .= "
        <tbody>
        <tr>
            <td class='text-center'><img class='img-thumbnail ' src='pic/" . $row['picture'] . "'</td>
            <td class='text-center'>" . $row['title'] . "</td>
            <td class='text-center'>" . $row['type'] . "</td>
            <td class='text-center'>" . $row['author_first_name'] . "</td>
            <td class='text-center'>" . $row['publisher_name'] . "</td>
            <td class='text-center'>" . $row['status'] . "</td>
            <td class='text-center'><a href='update.php?id=" . $row['id'] . "'><button class='btn btn-primary btn-sm' type='button'>Update</button></a>
            <a href='details.php?id=" . $row['id'] . "'><button class='btn btn-warning btn-sm' type='button'>Details</button></a>
            <a href='delete.php?id=" . $row['id'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a>
            </td>
        </tr>
    </tbody>
    ";
    }
} else {
    $tbody = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Markos Library</title>
    <?php require_once 'components/boot.php' ?>
    <style type="text/css">
        .manageProduct {
            margin: auto;
        }

        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }

        td {
            text-align: left;
            vertical-align: middle;

        }

        tr {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="manageProduct w-75 mt-3">
        <div class="container p-5">
            <div class='row'>
                <div class='mb-3 col-auto mr-auto'>
                    <a href="create.php"><button class='btn btn-info' type="button">Add to library</button></a>
                </div>
                <div class="dropdown col-auto">
                    <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
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
        <p class='h2'>library</p>
        <table class='table table-hover shadow p-3 mb-5'>
            <thead class='table-dark'>
                <tr>
                    <th scope="col">Picture</th>
                    <th scope="col">Title</th>
                    <th scope="col">Type</th>
                    <th scope="col">Author</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?= $tbody; ?>

            </tbody>
        </table>
    </div>
</body>

</html>