<?php
echo '<br>'.'Update_time.php'.'<br>';

$day = $_REQUEST["day"];
$month = $_REQUEST["month"];
$year = $_REQUEST["year"];
$new_entry = $_REQUEST["newentry"];
$intime = $_REQUEST["intime"];
$outtime = $_REQUEST["outtime"];

$servername = "localhost";
$username = "root";
$password = "3fyHQTTH@jYvLoQtup8M";
$dbname = "wp_filipscoolakalender";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "IDAG ÄR DET ".$day.' '.$month.' '.$year;
if($new_entry){

    $sql = "INSERT INTO timetracking ( intime, outtime, breakduration , day, month, year )
VALUES ($intime,$outtime,1,$day,'$month',$year)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
else{
    echo 'entry already exist';
}
$conn->close();
?>