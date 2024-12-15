<?php
session_start();
require "config.php";

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = md5($_POST["pass"]);
    $role = $_POST["role"];

    // Validate input (add more checks as needed)
    if (empty($username) || empty($password) || empty($role)) {
        $error_message = "Please fill in all required fields.";
    } else {
        // Check if username already exists
        $sql_check = "SELECT * FROM users WHERE username = '$username'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows > 0) {
            $error_message = "Username already exists.";
        } else {

            // Insert user data into the database
            $sql_insert = "INSERT INTO users (username, pass, role) VALUES ('$username', '$password', '$role')";

            if ($conn->query($sql_insert) === TRUE) {

                // Registration successful
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;
                $_SESSION['status'] = "y";
                header("Location:login.php");
            } else {
                $error_message = "Error inserting user data.";
            }
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>

<?php if (isset($error_message)) : ?>
    <div class="alert alert-danger" align="center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong><?= $error_message ?></strong>
    </div>
<?php endif; ?>

<div class="container-fluid" style="margin-top:150px">
    <div class="row">
        <div class="col-lg-4 offset-lg-4">
            <form method="POST">
                <div class="card border-dark">
                    <div class="card-header bg-primary text-light border-dark">
                        <strong>Registration</strong>
                    </div>
                    <div class="card-body border">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="username" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="pass" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="">Role</label>
                            <select class="form-control" name="role" required>
                                <option value="">Select a role</option>
                                <option>Pasien</option>
                                </select>
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Register">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="assets/js/jquery-3.7.0.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>