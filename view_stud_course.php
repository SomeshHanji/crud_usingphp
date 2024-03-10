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
    <a href="view_student.php">View Students</a>
    <a  href="add_course.php">Add Course</a>
    <a class="active"  href="view_stud_course.php">Student's Courses</a>
    <a  href="upload_csv.php">Upload File</a>
    
</div>


    <div class="container">
        <h2>Student and course Details</h2>
<table class="table" id="data-table">
    <thead>
        <tr>
        <th>Name</th>
        <th>Subject 1</th>
        <th>Subject 2</th>

    </tr>
    </thead>
    <tbody>
        <?php
                $sql = "SELECT students.name AS student_name, stud_course.subject_1, stud_course.subject_2 FROM students INNER JOIN stud_course ON students.id = stud_course.student_id;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>
                    <tr>

                    <td><?php echo $row['student_name']; ?></td>
                    <td><?php echo $row['subject_1']; ?></td>
                    <td><?php echo $row['subject_2']; ?></td>
                
                    </tr>
        <?php       }
            }
        ?>
    </tbody>
</table>
<button onclick="exportToCSV()">Export to CSV</button>
    </div>
    
    <script>
function exportToCSV() {
    var data = [];
    var table = document.getElementById('data-table');
    var rows = table.rows;
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].cells;
        for (var j = 0; j < cols.length; j++) {
            // Since there are no action buttons in this table, we don't need to skip any columns.
            row.push(cols[j].innerText);
        }
        data.push(row);
    }

    // Convert the data to CSV format
    var csvContent = "data:text/csv;charset=utf-8,";
    data.forEach(function(rowArray) {
        var row = rowArray.join(",");
        csvContent += row + "\r\n";
    });

    // Create a temporary link element, set the CSV data as its href attribute,
    // and programmatically click it to start the download
    var encodedUri = encodeURI(csvContent);
    var link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "student_course_data.csv");
    document.body.appendChild(link); // Required for Firefox
    link.click();
}
</script>

</body>
</html>