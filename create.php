<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'components/boot.php' ?>
    <title>Markos Library</title>
    <style>
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 60%;
        }
    </style>
</head>

<body>
    <fieldset>
        <legend class='h2'>Add To Library</legend>
        <form action="actions/a_create.php" method="post" enctype="multipart/form-data">
            <table class='table'>
                <tr>
                    <th>Title</th>
                    <td><input class='form-control' type="text" name="title" placeholder="title" /></td>
                </tr>
                <tr>
                    <th>ISBN Code</th>
                    <td><input class='form-control' type="number" name="isbncode" placeholder="123" /></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>
                        <textarea class="form-control" placeholder="Description" id="floatingTextarea"
                            name="short_description"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>Type</th>
                    <td><select class="form-select" aria-label="Default select example" name="type">
                            <option value="book">Book</option>
                            <option value="cd">CD</option>
                            <option value="dvd">DVD</option>
                        </select></td>
                </tr>
                <tr>
                    <th>Author First Name</th>
                    <td><input class='form-control' type="text" name="author_first_name"></td>
                </tr>
                <tr>
                    <th>Author Last Name</th>
                    <td><input class='form-control' type="text" name="author_last_name"></td>
                </tr>
                <tr>
                    <th>Publisher Name</th>
                    <td><input class='form-control' type="text" name="publisher_name"></td>
                </tr>
                <tr>
                    <th>Publisher Address</th>
                    <td><input class='form-control' type="text" name="publisher_address"></td>
                </tr>
                <tr>
                    <th>Publish Date</th>
                    <td><input class='form-control' type="date" name="publish_date"></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><select class="form-select" aria-label="Default select example" name="status">
                            <option value="available">Available</option>
                            <option value="reserved">Reserved</option>
                        </select></td>
                </tr>
                <tr>
                    <th>Picture</th>
                    <td><input class='form-control' type="file" name="picture" /></td>
                </tr>
                <tr>
                    <td><button class='btn btn-success' type="submit">Insert Product</button></td>
                    <td><a href="index.php"><button class='btn btn-warning' type="button">Home</button></a></td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>

</html>