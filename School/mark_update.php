<?php
$conn = mysqli_connect("localhost", "root", "", "student_db");

if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

$list = mysqli_query($conn, "SELECT rollno FROM students");

if (isset($_POST['update']))
{
    $roll = $_POST['rollno'];
    $s    = (int)$_POST['science'];
    $m    = (int)$_POST['maths'];
    $e    = (int)$_POST['english'];
    $t    = $s + $m + $e;

    mysqli_query($conn, "UPDATE students SET science='$s', maths='$m', english='$e', total='$t' WHERE rollno='$roll'");
    echo "Marks Updated";
}
?>
<html>
    <body>
        <h2>Update Marks</h2>
        <form method="POST">
            Roll No: 
            <select name="rollno">
                <?php
                while ($r = mysqli_fetch_assoc($list))
                {
                    echo "<option>{$r['rollno']}</option>";
                }
                ?>
            </select><br><br>
            New Science: <input type="number" name="science"><br><br>
            New Maths: <input type="number" name="maths"><br><br>
            New English: <input type="number" name="english"><br><br>
            <input type="submit" name="update" value="Update">
        </form>
    </body>
</html>