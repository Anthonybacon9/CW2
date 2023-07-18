<?php 

//Create Connection
$con = mysqli_connect('localhost', 'root', '', '5130cw');


//Check Connection
if(!$con) {
    die("Connection Failed: ".mysqli_conect_error());
}


?>