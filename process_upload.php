<?php

include "config.php";

// Check if the file was uploaded without errors
if(isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0){
    // Path to the uploaded CSV file
    $csv_file = $_FILES["fileToUpload"]["tmp_name"];

    // Open the uploaded CSV file for reading
    $file_handle = fopen($csv_file, "r");

    // Check if the file opened successfully
    if ($file_handle !== FALSE) {
        // Skip the header row
        fgetcsv($file_handle, 1000, ",");
        
        // Read the file line by line until the end
        while (($data = fgetcsv($file_handle, 1000, ",")) !== FALSE) {
            // Extract data from the CSV row
            $name = $data[0]; // Assuming the first column contains names
            $age = $data[1]; // Assuming the second column contains ages
            $email = $data[2]; // Assuming the third column contains emails

            // Insert the data into the database
            $sql = "INSERT INTO students (name, age, email) VALUES ('$name', '$age', '$email')";

            if ($conn->query($sql) === TRUE) {
                echo "Record inserted successfully<br>";
                header('Location: view_student.php');
            } else {
                echo "Error inserting record: " . $conn->error . "<br>";
                header('Location: view_student.php');
            }
        }

        // Close the file handle
        fclose($file_handle);
    } else {
        echo "Error opening file<br>";
        header('Location: view_student.php');
    }
} else {
    echo "Error uploading file<br>";
    header('Location: view_student.php');
}

// Close the database connection
$conn->close();
?>
