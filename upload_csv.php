<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload CSV File</title>
</head>
<body>
    <h2>Upload CSV File</h2>
    <form action="process_upload.php" method="post" enctype="multipart/form-data">
        Select CSV file to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>
</html>


<?php
// include "config.php";

// // Path to the CSV file
// $csv_file = "sample_data.csv";

// // Open the CSV file for reading
// $file_handle = fopen($csv_file, "r");

// // Check if the file opened successfully
// if ($file_handle !== FALSE) {
//     // Skip the header row
//     fgetcsv($file_handle, 1000, ",");
    
//     // Read the file line by line until the end
//     while (($data = fgetcsv($file_handle, 1000, ",")) !== FALSE) {
//         // Extract data from the CSV row
//         $name = $data[0]; // Assuming the first column contains names
//         $age = $data[1]; // Assuming the second column contains ages
//         $email = $data[2]; // Assuming the third column contains emails

//         // Insert the data into the database
//         $sql = "INSERT INTO students (name, age, email) VALUES ('$name', '$age', '$email')";

//         if ($conn->query($sql) === TRUE) {
//             echo "Record inserted successfully<br>";
//             header('Location: view_student.php');
//         } else {
//             echo "Error inserting record: " . $conn->error . "<br>";
//             header('Location: view_student.php');
//         }
//     }

//     // Close the file handle
//     fclose($file_handle);
// } else {
//     echo "Error opening file<br>";
//     header('Location: view_student.php');
// }

// // Close the database connection
// $conn->close();
?>
