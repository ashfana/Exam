
<html>
<body>

<h2>Image Upload and Details</h2>

<form method="post" enctype="multipart/form-data">
Select Image:
<input type="file" name="image" required>
<br><br>
<input type="submit" name="submit" value="Upload">
</form>

<?php
if (isset($_POST["submit"])) {

    $file = $_FILES["image"];

    $fileName = $file["name"];
    $fileTmp = $file["tmp_name"];
    $fileSize = $file["size"];

    // Check if file is really an image
    $imageInfo = getimagesize($fileTmp);

    if ($imageInfo !== false) {

        // Move file to folder
        move_uploaded_file($fileTmp, "upload/" . $fileName);

        echo "<h3>Image Details</h3>";
        echo "File Name: " . $fileName . "<br>";
        echo "File Size: " . $fileSize . " bytes<br>";
        echo "Width: " . $imageInfo[0] . " px<br>";
        echo "Height: " . $imageInfo[1] . " px<br>";

        // Display image
        echo "<br><img src='upload/$fileName' width='200'>";

    } else {
        echo "<h3 style='color:red'>Only image files are allowed!</h3>";
    }
}
?>

</body>
</html>


<!DOCTYPE html>
<html>
<body>

<form method="post">
    Enter a word:
    <input type="text" name="word">
    <input type="submit" value="Check" name="submit">
</form>

<?php
if (isset($_POST["submit"])) {

    $string = $_POST["word"];
    $reverse = "";

    $length = strlen($string);

    for ($i = $length - 1; $i >= 0; $i--) {
        $reverse .= $string[$i];
    }

    if ($string == $reverse) {
        echo "<h3>$string is a Palindrome</h3>";
    } else {
        echo "<h3>$string is NOT a Palindrome</h3>";
    }
}
?>

</body>
</html>


<html>
<head>
<style>
table {
    border: 4px solid black;
    padding: 10px;
    width: 350px;
}
</style>
</head>
<body>

<form action="" method="POST">
<table>

<tr>
    <td>Name:</td>
    <td><input type="text" name="name" required></td>
</tr>

<tr>
    <td>Address:</td>
    <td>
        <textarea name="addr" cols="20" rows="5" required></textarea>
    </td>
</tr>

<tr>
    <td>DOB</td>
    <td><input type="date" name="dob" required></td>
</tr>

<tr>
    <td>Gender</td>
    <td>
        <input type="radio" name="gen" value="Male">Male
        <input type="radio" name="gen" value="Female">Female
    </td>
</tr>

<tr>
    <td>Hobbies</td>
    <td>
        <select name="hob[]" multiple="multiple" size="4" required>
            <option value="Coding">Coding</option>
            <option value="Drawing">Drawing</option>
            <option value="Travelling">Travelling</option>
            <option value="Gaming">Gaming</option>
        </select>
    </td>
</tr>

<tr>
    <td><input type="submit" value="Submit" name="submit"></td>
    <td><input type="reset" value="Reset"></td>
</tr>

</table>
</form>

<br><br>

<h3><u>After Submitting:</u></h3>

<table border="1">

<?php
if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $addr = $_POST["addr"];
    $dob = $_POST["dob"];
    $gen = $_POST["gen"];
    $hobbies = $_POST["hob"];

    $hobbies_str = implode(", ", $hobbies);

    echo "<tr><td>Name:</td><td>$name</td></tr>";
    echo "<tr><td>Address:</td><td>$addr</td></tr>";
    echo "<tr><td>DOB:</td><td>$dob</td></tr>";
    echo "<tr><td>Gender:</td><td>$gen</td></tr>";
    echo "<tr><td>Hobbies:</td><td>$hobbies_str</td></tr>";
}
?>

</table>
</body>
</html>


<html>
<head>
<title>Program 1</title>
</head>
<body>

<form action="" method="post">
<input type="submit" value="Create Database" name="createDB">
<input type="submit" value="Create Table" name="createTB">
<input type="submit" value="Delete Database" name="del">
</form>

<br><br>

<?php
$servername = "localhost";
$username = "root";
$pwd = "";

$con = new mysqli($servername, $username, $pwd);

if ($con) {
    echo "Connection Established<br>";
} else {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_POST["createDB"])) {

    $sql = "create database sand";

    if ($con->query($sql) === TRUE) {
        echo "Database created successfully";
    } else {
        die("Error creating database: " . $con->error);
    }
}

if (isset($_POST["createTB"])) {

    $con = new mysqli($servername, $username, $pwd, "sand");

    $sql = "create table details(
        Name varchar(30) not null,
        Age varchar(30) not null
    )";

    if ($con->query($sql) === TRUE) {
        echo "Table 'details' created successfully";
    } else {
        echo "Error creating table: " . $con->error;
    }
}

if (isset($_POST["del"])) {

    $sql = "drop database sand";
    $res = $con->query($sql);

    if ($res) {
        echo "<br>Database is deleted";
    } else {
        die("Some exception occurred");
    }
}
?>

</body>
</html>

// ============ connection.php ============
<?php
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con, "mydb");

if ($con) {
    echo "Connection is established<br>";
} else {
    die("Connection not established<br>".mysqli_error());
}
?>

// ============ insert.php ============
<html>
<body>
<a href="view.php">View</a> <br><br>

<?php
include("connection.php");
?>

<form method="post">
<table border="1">
<tr>
<td>Enter Name:</td>
<td>
<input type="text" name="name" required>
</td>
</tr>

<tr>
<td>Enter Age:</td>
<td>
<input type="number" name="age" required>
</td>
</tr>

<tr>
<td colspan="2">
<input type="submit" value="Insert" name="ins">
</td>
</tr>
</table>
</form>

<?php
if (isset($_POST['ins'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];

    $sql = "insert into details values('$name','$age')";
    $res = mysqli_query($con, $sql);

    if ($res) {
        echo "Details is inserted";
    } else {
        echo "Details is not inserted";
    }
}
?>

</body>
</html>

// ============ view.php ============
<html>
<head>
<title>View</title>
</head>
<body>
<a href="insert.php">Insert new record</a><br><br>
<table border=1>
<?php
include("connection.php");

$count = 0;
$sql = "select * from details order by name desc";
$res = mysqli_query($con, $sql);

echo "<tr><td>";
echo "NAME";
echo "</td><td>";
echo "AGE";
echo "</td></tr>";

while ($row = mysqli_fetch_assoc($res)) {
    echo "<tr><td>";
    echo $row["Name"];
    echo "</td><td>";
    echo $row["Age"];
    echo "</td></tr>";
    $count++;
}

if ($count == 0) {
    echo "No records in the table.";
}
?>
</table>
</body>
  </html>
