<?php
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "guvi";
    
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	
    $sql = "SELECT * FROM guvi_3;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "{". "<br>";
        echo "Name: ";
        echo $row['name'] . "<br>";
        echo "Email: ";
        echo $row['email']. "<br>";
        echo "Password: ";
        echo $row['password']. "<br>";
        echo "Age: ";
        echo $row['age'] . "<br>";
        echo "DOB: ";
        echo $row['dob']. "<br>";
        echo "Contact: ";
        echo $row['contact']. "<br>";
        echo "}". "<br>";

      }
    }
?>