<?php
$conn = mysqli_connect("localhost", "root", "", "student_db");

if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students ORDER BY total DESC LIMIT 1"));
?>
<html>
    <body>
        <h2>Top Student Full Details</h2>
        <?php
        if ($row)
        {
            ?>
            <p><b>Roll No:</b> <?php echo $row['rollno']; ?></p>
            <p><b>Name:</b> <?php echo $row['name']; ?></p>
            <p><b>Address:</b> <?php echo $row['address']; ?></p>
            <p><b>Phone No:</b> <?php echo $row['phno']; ?></p>
            <p><b>Username:</b> <?php echo $row['username']; ?></p>
            <hr>
            <p><b>Science Marks:</b> <?php echo $row['science']; ?></p>
            <p><b>Maths Marks:</b> <?php echo $row['maths']; ?></p>
            <p><b>English Marks:</b> <?php echo $row['english']; ?></p>
            <h3>Total Score: <?php echo $row['total']; ?></h3>
            <?php
        }
        else
        {
            echo "No student data found.";
        }
        ?>
    </body>
</html>