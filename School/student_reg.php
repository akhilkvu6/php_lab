<?php
$conn = mysqli_connect("localhost", "root", "", "student_db");

if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['register']))
{
    $roll = $_POST['rollno'];
    $name = $_POST['name'];
    $addr = $_POST['address'];
    $ph   = $_POST['phno'];
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "INSERT INTO students (rollno, name, address, phno, username, password, science, maths, english, total) 
            VALUES ('$roll', '$name', '$addr', '$ph', '$user', '$pass', 0, 0, 0, 0)";
    
    if (mysqli_query($conn, $sql))
    {
        echo "Registered Successfully";
    }
    else
    {
        echo "Error: Roll No exists.";
    }
}
?>
<html>
    <body>
        <h2>Student Registration</h2>
        <form method="POST">
            Roll No: <input type="text" name="rollno"><br><br>
            Name: <input type="text" name="name"><br><br>
            Address: <textarea name="address"></textarea><br><br>
            Phone: <input type="text" name="phno"><br><br>
            Username: <input type="text" name="username"><br><br>
            Password: <input type="password" name="password"><br><br>
            <input type="submit" name="register" value="Register">
        </form>
    </body>
</html>