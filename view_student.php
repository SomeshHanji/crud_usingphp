<?php
include "config.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Database</title>
    <style>
        /* Style the navigation bar */
        .navbar {
            overflow: hidden;
            background-color: #333;
        }

        /* Style the links inside the navigation bar */
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        /* Change the color of links on hover */
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Style the "active" element to highlight the current page */
        .navbar a.active {
            background-color: #4CAF50;
            color: white;
        }
    </style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<div class="navbar">
    <a href="create_student.php">Home Page</a>
    <a class="active" href="view_student.php">View Students</a>
    <a  href="add_course.php">Add Course</a>
    <a  href="view_stud_course.php">Student's Courses</a>
    <a  href="upload_csv.php">Upload File</a>
</div>

    <div class="container">
        <h2>Student Details</h2>
<table id="data-table" class="table">
    <thead>
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Email</th>
        <th id="dta-skip">Action</th>

    </tr>
    </thead>
    <tbody>
        <?php
                $sql = "SELECT * FROM students";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>
                    <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td id="dta-skip"><a class="btn btn-info" href="update_student.php?id=<?php echo $row['id']; ?>">Edit</a>
                     &nbsp;
                     <a class="btn btn-danger" href="delete_student.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                    </tr>
        <?php       }
            }
        ?>
    </tbody>
</table>

<button onclick="tableToCSV()">Export to CSV</button>
    </div>
    <script type="text/javascript">
        function tableToCSV() {
 
            // Variable to store the final csv data
            let csv_data = [];
 
            // Get each row data
            let rows = document.getElementsByTagName('tr');
            for (let i = 0; i < rows.length; i++) {
 
                // Get each column data
                let cols = rows[i].querySelectorAll('td,th');
 
                // Stores each csv row data
                let csvrow = [];
                for (let j = 0; j < cols.length; j++) {
 
                    // Get the text data of each cell
                    // of a row and push it to csvrow
                    csvrow.push(cols[j].innerHTML);
                }
 
                // Combine each column value with comma
                csv_data.push(csvrow.join(","));
            }
 
            // Combine each row data with new line character
            csv_data = csv_data.join('\n');
 
            // Call this function to download csv file  
            downloadCSVFile(csv_data);
 
        }
 
        function downloadCSVFile(csv_data) {
 
            // Create CSV file object and feed
            // our csv_data into it
            CSVFile = new Blob([csv_data], {
                type: "text/csv"
            });
 
            // Create to temporary link to initiate
            // download process
            let temp_link = document.createElement('a');
 
            // Download csv file
            temp_link.download = "GfG.csv";
            let url = window.URL.createObjectURL(CSVFile);
            temp_link.href = url;
 
            // This link should not be displayed
            temp_link.style.display = "none";
            document.body.appendChild(temp_link);
 
            // Automatically click the link to
            // trigger download
            temp_link.click();
            document.body.removeChild(temp_link);
        }
    </script>


    </body>
</html>