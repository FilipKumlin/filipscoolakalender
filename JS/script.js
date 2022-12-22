function loadDoc($day,$month,$year) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "/wp-content/themes/Kalender/form.php?day="+$day+"&"+"month="+ $month + "&"+"year="+ $year, true);
  xhttp.send();
}
function update_time($day,$month,$year,$new_entry) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("demo_two").innerHTML = this.responseText;
    }
  };
  $intime = (document.getElementById("start-time").value);
  $outtime = (document.getElementById("end-time").value);
  console.log($day);
  xhttp.open("GET", "/wp-content/themes/Kalender/update-time.php?day="+$day+"&"+"month="+ $month + "&"+"year="+ $year +"&"+"newentry="+ "intime="+ $intime +"&"+"outtime="+ $outtime, true);
  xhttp.send();
}