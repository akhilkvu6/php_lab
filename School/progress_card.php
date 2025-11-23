<?php
$conn = mysqli_connect("localhost", "root", "", "student_db");

if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

$list = mysqli_query($conn, "SELECT rollno FROM students");
?>
<html>
    <body>
        <h2>Progress Card</h2>
        <form method="POST">
            Roll No: 
            <select name="rollno">
                <?php
                while ($r = mysqli_fetch_assoc($list))
                {
                    echo "<option>{$r['rollno']}</option>";
                }
                ?>
            </select>
            <input type="submit" name="view" value="Show">
        </form>
        <br>
        <?php
        if (isset($_POST['view']))
        {
            $roll = $_POST['rollno'];
            $row  = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students WHERE rollno='$roll'"));
            
            echo "<b>Name:</b> " . $row['name'] . "<br>";
            echo "<b>Science:</b> " . $row['science'] . "<br>";
            echo "<b>Maths:</b> " . $row['maths'] . "<br>";
            echo "<b>English:</b> " . $row['english'] . "<br>";
            echo "<b>Total:</b> " . $row['total'];
        }
        ?>
    </body>
</html>