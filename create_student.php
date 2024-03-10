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
    <a class="active" href="#home">Home Page</a>
    <a href="view_student.php">View Students</a>
    <a href="add_course.php">Add Course</a>
    <a  href="view_stud_course.php">Student's Courses</a>
    <a  href="upload_csv.php">Upload File</a>
</div>
<h2>Student Form</h2>
<form action="" method="POST">
  <fieldset>
    <legend>Student information:</legend>
    Name:<br>
    <input type="text" name="name"> <br>
    Age:<br>
    <input type="text" name="age"> <br>
    Email:<br>
    <input type="email" name="email"><br>
    <br><br>
    <input type="submit" name="submit" value="submit">
  </fieldset>
</form>
<!-- <h2>Student subjects</h2>
<form action="" method="POST">
  <fieldset>
    <legend>Student information:</legend>
    student id<br>
    <input type="text" name="name"> <br>
    subject 1<br>
    <input type="text" name="age"> <br>
    subject 2<br>
    <input type="email" name="email"><br>
    <br><br>
    <input type="submit" name="submit" value="submit">
  </fieldset>
</form> -->
</body>
</html>

<?php
include "config.php";
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $sql = "INSERT INTO `students`(`name`, `age`, `email`) VALUES ('$name','$age','$email')";
    $result = $conn->query($sql);
    if ($result == TRUE) {
      echo "New record created successfully.";
      header('Location: view_student.php');
    }else{
      echo "Error:". $sql . "<br>". $conn->error;
    }
    $conn->close();
  }
?>