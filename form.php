<?php 
echo 'From.php'.'<br>';
$day = $_REQUEST["day"];
$month = $_REQUEST["month"];
$year = $_REQUEST["year"];
echo $day.$month.$year."<br>";


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

$sql = "SELECT intime, outtime, breakduration , day, month, year FROM timetracking  WHERE day= $day AND month ='$month' AND year = $year";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "day: " . $row["day"]. " - month: " . $row["month"]. " - year: " . $row["year"]. "<br>";
  }
  $new_entry = false;
} else {
  $new_entry = true;
  echo "0 results";
}
$conn->close();
?>
 <form id="time-picker" onsubmit="return false">
      <input type="time"    id="start-time" label="Starttid"  value="08:00">
      <input type="time"    id="end-time" label="Sluttid"   value="17:00">
      
  </form>
  <button onclick="update_time(<?php echo $day; ?>, '<?php echo $month; ?>', <?php echo $year; ?>,<?php echo $new_entry; ?>)">submit</button>

  <?php 
  echo '<br>'.'End of from.php';