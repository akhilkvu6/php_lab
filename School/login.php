<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "student_db");

if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['login']))
{
    if ($_POST['username'] == "admin" && $_POST['password'] == "admin123")
    {
        header("Location: adminhome.php");
    }
    else
    {
        echo "Invalid Username or Password";
    }
}
?>
<html>
    <body>
        <h2>Admin Login</h2>
        <form method="POST">
            Username: <input type="text" name="username"><br><br>
            Password: <input type="password" name="password"><br><br>
            <input type="submit" name="login" value="Login">
        </form>
    </body>
</html>