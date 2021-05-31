<?php

// Muhammad Saad Hassan
// P176137 Section 6B

// Display Record
    error_reporting(0);
    $dbhost= "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "nutec";
    $search = $_POST["searchop"];
    $searchinput = $_POST["searchinput"];

    $conn = new mysqli($dbhost,$dbuser,"","","3306");

    if ($conn->connect_error)
    {
        die("<br>Connection Failed: ");
    }
    else
    {
        echo "<br>connected successfully <br>";
    }


    mysqli_connect('localhost','root','');
    // "Select * from Registratiom where $search =$searchinput"
    // $query =$conn->query( "Select * from `Registration` where `$search` =$searchinput");

    $user_qry = "USE ".$db. "";


        if($conn->query($user_qry))
        {
            echo "<br>Using this database<br>";
        }
        else
        {
            echo"cant use this db";
        }
        $sql = "Select * from `registration` where $search = $searchinput";
        echo "column ".$search. " = ".$searchinput."<br>";



        $result = $conn->query($sql);
        if ($result->num_rows > 0) {

            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "Name: " . $row["Name"]. " - Roll_no: " . $row["roll_no"]. " - event: " . $row["event"]. " - department: ". $row["department"]. "<br>";
            }

        }
        else 
        {
            trigger_error('Invalid query: ' . $conn->error);
        }
            $conn->close();


          

?>