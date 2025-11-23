<?php
$conn = mysqli_connect("localhost", "root", "", "student_db");

if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['delete']))
{
    $roll = $_POST['rollno'];
    mysqli_query($conn, "DELETE FROM students WHERE rollno='$roll'");
    echo "<script>window.location='manage_students.php';</script>";
}

if (isset($_POST['update']))
{
    $roll = $_POST['rollno'];
    $name = $_POST['name'];
    $s    = (int)$_POST['science'];
    $m    = (int)$_POST['maths'];
    $e    = (int)$_POST['english'];
    $t    = $s + $m + $e;
    
    mysqli_query($conn, "UPDATE students SET name='$name', science='$s', maths='$m', english='$e', total='$t' WHERE rollno='$roll'");
    echo "Updated";
}
?>
<html>
    <body>
        <h2>Manage Students</h2>
        <table border="1">
            <tr>
                <th>Roll No</th><th>Name</th><th>Sci</th><th>Mat</th><th>Eng</th><th>Total</th><th>Action</th>
            </tr>
            <?php
            $res = mysqli_query($conn, "SELECT * FROM students");
            while ($row = mysqli_fetch_assoc($res))
            {
                echo "<form method='POST'><tr>";
                echo "<td><input type='text' name='rollno' value='{$row['rollno']}' readonly></td>";
                echo "<td><input type='text' name='name' value='{$row['name']}'></td>";
                echo "<td><input type='number' name='science' value='{$row['science']}'></td>";
                echo "<td><input type='number' name='maths' value='{$row['maths']}'></td>";
                echo "<td><input type='number' name='english' value='{$row['english']}'></td>";
                echo "<td>{$row['total']}</td>";
                echo "<td><input type='submit' name='update' value='Update'> <input type='submit' name='delete' value='Delete'></td>";
                echo "</tr></form>";
            }
            ?>
        </table>
    </body>
</html>