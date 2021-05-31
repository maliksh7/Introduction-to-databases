<html>
<head>
    <title>Registration Form (Inser Data in db)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php if (isset($_POST['roll_no'],$_POST["name"],$_POST["event"],$_POST["department"])) {


    $username = 'root';
    $password = '';
    // Check connection
    try {
        $conn = new PDO("mysql:host=localhost;dbname=nutec", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $name = $_POST["name"];
    $rollno = $_POST["roll_no"];
    $event = $_POST["event"];
    $department = $_POST["department"];
    

   


    //prepare and bind
    $data = array($name, $rollno,$event, $department);
    $query_1 = $conn->prepare("INSERT INTO Registration (Name, roll_no, event,department)
    VALUES (?,?,?,?)");

    $result=$query_1->execute($data);

    if(mysqli_query($conn, $query_1)){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
     
    // Close connection
    mysqli_close($conn);

  

 


}

else {
    ?>

    <h2>Registration Form</h2>
    <form action="db8.php" method="POST">
    
        name:
        <input type="text" name="name"><br>

        roll NO:
        <input type="text" name="roll_no"><br><br>

        Event:
        <input type="text" name="event"><br><br>

        Department:
        <input type="text" name="department"><br>




        <input type="submit" value="Submit">
    </form>

    <?php
}
?>
</body>
</html>
