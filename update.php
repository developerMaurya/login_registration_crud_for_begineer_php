<?php
include 'connection/conn.php';

if (isset($_POST['done'])) {
    $id = $_GET['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $updateQuery = "UPDATE crudtable SET username='$username', password='$password' WHERE id=$id";
    $query = mysqli_query($con, $updateQuery);

    header('location: display.php');
}

// Retrieve existing values from the database
$id = $_GET['id'];
$selectQuery = "SELECT * FROM crudtable WHERE id=$id";
$result = mysqli_query($con, $selectQuery);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>crud demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="col-lg-6 m-auto">
        <form method="post">
            <br><br>
            <div class="card" style="border-width: 0">
                <div class="card-header bg-dark">
                    <h1 class="text-white text-center">Update Operation</h1>
                </div>
                <label>Username:</label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username" value="<?php echo $row['username']; ?>"><br>
                <label>Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" value="<?php echo $row['password']; ?>"><br>
                <button class="btn btn-success" type="submit" name="done">Submit</button><br>
            </div>
        </form>
    </div>
</body>
</html>
