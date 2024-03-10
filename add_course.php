<!DOCTYPE html>
<html>
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
<body>
<div class="navbar">
    <a href="create_student.php">Home Page</a>
    <a href="view_student.php">View Students</a>
    <a class="active"  href="add_course.php">Add Course</a>
    <a  href="view_stud_course.php">Student's Courses</a>
    <a  href="upload_csv.php">Upload File</a>
</div>

<h2>Student subjects</h2>
<form action="" method="POST">
  <fieldset>
    <legend>Student information:</legend>
    student id<br>
    <input type="number" name="ID"> <br>
    subject 1<br>
    <input type="text" name="sub1"> <br>
    subject 2<br>
    <input type="text" name="sub2"><br>
    <br><br>
    <input type="submit" name="submit" value="submit">
  </fieldset>
</form>
</body>
</html>

<?php
include "config.php";
  if (isset($_POST['submit'])) {
    $id = $_POST['ID'];
    $sub1 = $_POST['sub1'];
    $sub2 = $_POST['sub2'];
    $sql = "INSERT INTO `stud_course` VALUES ('$id','$sub1','$sub2')";
    $result = $conn->query($sql);
    if ($result == TRUE) {
      echo "New record created successfully.";
      header('Location: view_stud_course.php');
    }else{
      echo "Error:". $sql . "<br>". $conn->error;
    }
    $conn->close();
  }
?>

