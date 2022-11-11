<?php
require_once 'actions/db_connect.php';
if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM library WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $title = $data['title'];
        $isbncode = $data['isbncode'];
        $dis = $data['short_description'];
        $type = $data['type'];
        $author_first_name = $data['author_first_name'];
        $author_last_name = $data['author_last_name'];
        $publisher_name = $data['publisher_name'];
        $publisher_address = $data['publisher_address'];
        $publish_date = $data['publish_date'];
        $status = $data['status'];
        $picture = $data['pic'];
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Update</title>
    <?php require_once 'components/boot.php' ?>
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }

        .img-thumbnail {
            width: 70px !important;
            height: 70px !important;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend class='h2'>Update request <img class='img-thumbnail rounded-circle' src='pic/<?php echo $picture ?>'
                alt="<?php echo $name ?>"></legend>
        <form action="actions/a_update.php" method="post" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <th>Title</th>
                    <td><input class="form-control" type="text" name="title" placeholder="Product Name"
                            value="<?php echo $title ?>" /></td>
                </tr>
                <tr>
                    <th>ISBN code</th>
                    <td><input class="form-control" type="number" name="isbncode" step="any" placeholder="123"
                            value="<?php echo $isbncode ?>" /></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><input class="form-control" type="text" name="short_description" placeholder="Description"
                            value="<?php echo $shortdescription ?>" /></td>
                </tr>
                <tr>
                    <th>Type</th>
                    <td><select class="form-select" aria-label="Default select example" name="type">
                            <option>Book</option>
                            <option>CD</option>
                            <option>DVD</option>
                        </select></td>
                </tr>
                <tr>
                    <th>Author First Name</th>
                    <td><input class="form-control" type="text" name="author_first_name"
                            value="<?php echo $author_first_name ?>" /></td>
                </tr>
                <tr>
                    <th>Author Last Name</th>
                    <td><input class="form-control" type="text" name="author_last_name"
                            value="<?php echo $author_last_name ?>" /></td>
                </tr>
                <tr>
                    <th>Publisher Name</th>
                    <td><input class="form-control" type="text" name="publisher_name"
                            value="<?php echo $publisher_name ?>" /></td>
                </tr>
                <tr>
                    <th>Publisher Address</th>
                    <td><input class="form-control" type="text" name="publisher_address"
                            value="<?php echo $publisher_address ?>" /></td>
                </tr>
                <tr>
                    <th>Publish Date</th>
                    <td><input class="form-control" type="text" name="publish_date"
                            value="<?php echo $publish_date ?>" /></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><select class="form-select" aria-label="Default select example" name="status">
                            <option>Available</option>
                            <option>Reserved</option>
                        </select></td>
                </tr>
                <tr>
                    <th>Picture</th>
                    <td><input class="form-control" type="file" name="pic" /></td>
                </tr>
                <tr>
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                    <input type="hidden" name="pic" value="<?php echo $data['pic'] ?>" />
                    <td><button class="btn btn-success" type="submit">Save Changes</button></td>
                    <td><a href="index.php"><button class="btn btn-warning" type="button">Back</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>

</html>