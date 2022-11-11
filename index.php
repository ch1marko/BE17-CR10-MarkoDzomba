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
    <title>PHP CRUD</title>
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
        <div class='mb-3'>

            <a href="create.php"><button class='btn btn-primary' type="button">Add product</button></a>
        </div>
        <p class='h2'>Products</p>

        <table class='table table-striped'>
            <thead class='table-success'>
                <tr>

                    <th>Picture</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?= $tbody; ?>

            </tbody>
        </table>
    </div>
</body>

</html>