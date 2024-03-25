<?php

// set connection details
define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "tutorial_db");


// connection function with above 4 details

// CONNECTION VARIABLE WILL HOLD THE CONNECTION IN ALL FILES WE WILL MAKE


$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);


// check if connection established
if(!$connection){
    die("Connection Failed!");
}



?>