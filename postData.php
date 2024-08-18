<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "iotnewdb";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }

	date_default_timezone_set("Asia/Kolkata");
	$date_curr=date('20y-m-d');
	$time_curr=date('h:i:sa');


    if(!empty($_GET['fireupdate']))
    {
        $sensorData1 = $_GET['fireupdate'];
	$nodeid = $_GET['nodeid'];

        $sql = "UPDATE fireupdate_tab set firedet = $sensorData1, fdate='$date_curr', ftime='$time_curr' where nodeid = $nodeid";

        if ($conn->query($sql) === TRUE) {
            echo $sensorData1;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
?>