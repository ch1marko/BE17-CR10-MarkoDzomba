<?php
require_once 'db_connect.php';
require_once 'file_upload.php';
if ($_POST) {
    $title = $_POST['title'];
    $isbncode = $_POST['isbncode'];
    $dis = $_POST['short_description'];
    $type = $_POST['type'];
    $author_first_name = $_POST['author_first_name'];
    $author_last_name = $_POST['author_last_name'];
    $publisher_name = $_POST['publisher_name'];
    $publisher_address = $_POST['publisher_address'];
    $publish_date = $_POST['publish_date'];
    $status = $_POST['status'];
    $uploadError = '';
    $picture = file_upload($_FILES['pic']);
    $sql = "INSERT INTO library(`title`, `isbncode`, `pic`, `short_description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `status`) VALUES ('$title', '$isbncode','$picture->fileName','$shortdescription', '$type', '$author_first_name', '$author_last_name', '$publisher_name', '$publisher_address', '$publish_date', '$status')";
    if (mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td> $title </td>
            <td> $isbncode </td>
            <td> $shortdescription </td>
            <td> $type </td>
            <td> $author_first_name </td>
            <td> $author_last_name </td>
            <td> $publisher_name </td>
            <td> $publisher_address </td>
            <td> $publish_date </td>
            <td> $status </td>
            </tr></table><hr>";
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
        header("refresh:3;url= ../index.php");
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <?php require_once '../components/boot.php'?>
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Create request response</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>