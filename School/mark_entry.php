<?php
$conn = mysqli_connect("localhost", "root", "", "student_db");

if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

$list = mysqli_query($conn, "SELECT rollno FROM students");

if (isset($_POST['save']))
{
    $roll = $_POST['rollno'];
    $s    = (int)$_POST['science'];
    $m    = (int)$_POST['maths'];
    $e    = (int)$_POST['english'];
    $t    = $s + $m + $e;

    mysqli_query($conn, "UPDATE students SET science='$s', maths='$m', english='$e', total='$t' WHERE rollno='$roll'");
    echo "Marks Saved";
}
?>
<html>
    <body>
        <h2>Mark Entry</h2>
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
            Science: <input type="number" id="m1" name="science"><br><br>
            Maths: <input type="number" id="m2" name="maths"><br><br>
            English: <input type="number" id="m3" name="english"><br><br>
            <button type="button" onclick="calc()">Check Total</button> 
            <span id="res"></span><br><br>
            <input type="submit" name="save" value="Save">
        </form>
        <script>
            function calc()
            {
                let m1 = parseInt(document.getElementById("m1").value) || 0;
                let m2 = parseInt(document.getElementById("m2").value) || 0;
                let m3 = parseInt(document.getElementById("m3").value) || 0;
                document.getElementById("res").innerHTML = "Total: " + (m1 + m2 + m3);
            }
        </script>
    </body>
</html>