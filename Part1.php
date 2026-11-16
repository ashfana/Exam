1.	Write a Php script to check whether a given number is Armstrong or not.
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Armstrong Number</title>
</head>
<body>
<form method="post">
<table border="1">
<tr>
<td>Enter Number:</td>
<td><input type="number" name="number"></td>
</tr>
<tr>
<td></td>
<td>
<input type="submit" value="Sumbit" name="Submit">
</td>
</tr>
<?php
if (isset($_POST['number'])) {
$a = $_POST['number'];
$number = $a;
$sum = 0;
while ($number != 0) {
$r = $number % 10;
$sum = $sum + ($r * $r * $r);
$number = (int)($number / 10);
}
if ($a == $sum) {
echo "$a is an Amstrong Number";
} else {
echo "$a is not an Amstrong Number";
}
}
?>
</table>
</form>
</body>
</html>
*2nd lab program updated* 
<?php
date_default_timezone_set('Asia/Kolkata');

$time=date('G:i');
echo"current time is: $time<br>";

$a=date('G');

if($a>=0&& $a<=5)
    echo "It's Late Night";
else if($a>=6 && $a<=11)
    echo "Good Morning";
else if($a>=12 && $a<=16)
    echo "Good Afternoon";
else if($a>=17 && $a<=23)
    echo "Good Evening";
echo"<br>";

$date = date('d-m-Y');
echo "Today's Date is $date<br>";

$b=date('l');
echo"Today is $b<br>";
?>
*3rd lab program array concept*

<html>
<body>
<h2>Student Marks</h2>
<?php
$stdMarks = array(
    "Ramesh" => array(
        "Java" => "88",
        "Php" => "98",
        "Networking" => "78"
    ),
    "Suresh" => array(
        "Java" => "83",
        "Php" => "90",
        "Networking" => "82"
    ),
    "Kishan" => array(
        "Java" => "85",
        "Php" => "90",
        "Networking" => "79"
    )
);
foreach ($stdMarks as $std => $subjectArray) {
    echo "Marks of $std:<br>";
    foreach ($subjectArray as $subject => $marks) {
        echo "$subject = $marks&nbsp;&nbsp;&nbsp;";
    }
    echo "<br><br>";
}
?>
</body>
</html>
4.	Write a Php program to generate a simple calculator.
<?php
$display = "";

if (isset($_POST['btn'])) {
    $button = $_POST['btn'];
    $display = $_POST['display'];

    if ($button == "C") {
        $display = ""; // Clear the screen
    	} 
	elseif ($button == "=") {
        
        if (strpos($display, '+') !== false) {
            $numbers = explode('+', $display);
            $display = $numbers[0] + $numbers[1];
        } elseif (strpos($display, '-') !== false) {
            $numbers = explode('-', $display);
            $display = $numbers[0] - $numbers[1];
        } elseif (strpos($display, '*') !== false) {
            $numbers = explode('*', $display);
            $display = $numbers[0] * $numbers[1];
        } elseif (strpos($display, '/') !== false) {
            $numbers = explode('/', $display);
            // Check for division by zero
            if ($numbers[1] == 0) {
                $display = "Error";
            } else {
                $display = $numbers[0] / $numbers[1];
            }
        }
        
       
    } else {
        
        $display .= $button;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple BCA Calculator</title>
    <style>
        
        .screen { width: 20%; height: 30px; font-size: 10px; text-align: right;  }
        .btn { width: 45px; height: 45px; font-size: 18px; margin: 2px; }
    </style>
</head>
<body>

<div class="calc">
    <form method="post">
        <input type="text" class="screen" name="display" value="<?php echo $display; ?>" maxlength="9" readonly>
        <br>
        <input type="submit" class="btn" name="btn" value="7">
        <input type="submit" class="btn" name="btn" value="8">
        <input type="submit" class="btn" name="btn" value="9">
        <input type="submit" class="btn" name="btn" value="/">
        <br>
        <input type="submit" class="btn" name="btn" value="4">
        <input type="submit" class="btn" name="btn" value="5">
        <input type="submit" class="btn" name="btn" value="6">
        <input type="submit" class="btn" name="btn" value="*">
        <br>
        <input type="submit" class="btn" name="btn" value="1">
        <input type="submit" class="btn" name="btn" value="2">
        <input type="submit" class="btn" name="btn" value="3">
        <input type="submit" class="btn" name="btn" value="-">
        <br>
        <input type="submit" class="btn" name="btn" value="C">
        <input type="submit" class="btn" name="btn" value="0">
        <input type="submit" class="btn" name="btn" value="=">
        <input type="submit" class="btn" name="btn" value="+">
    </form>
</div>

</body>
</html>
5.Write a PHP program to demonstrate $_POST method and display pattern.
<html>
<body>
<?php
$noOfLines = "";
$symbol = "";
if (isset($_POST["submit"])) {
$noOfLines = $_POST["line"];
$symbol = $_POST["symbol"];
}
?>
<h2>Pyramid</h2>
<form method="post">
Enter the loop number:
<input type="number" name="line" required value="<?php echo $noOfLines; ?>"><br><br>
Enter the symbol:
<input type="text" name="symbol" required value="<?php echo $symbol; ?>"><br><br>
<input type="submit" value="Submit" name="submit">
<input type="submit" value="Clear" name="clr"><br><br> 
</form>
<?php
if ($noOfLines and $symbol) {
for ($i = 0; $i < $noOfLines; $i++) {
for ($j = 0; $j < $i + 1; $j++) {
echo "<b>$symbol</b>&nbsp;&nbsp;";
}
echo "<br>";
}
}
?>
</body>
</html>
