<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * This file provides an example of how to separate the interface for the user , e.g., PhP from from the program logic, e.g., PhP statements.
 */
-->


<?php
session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_GET['Sid'])) {
    $sid = $_GET['Sid'];
    $sql = "SELECT * FROM Student where student_id = $sid";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
}
else {
    echo "No user id received on request at update_student_interface get";
    die();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Update</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Update Student</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <!-- Displaying a form with the information of the user so values can be modified 
             Note that the ID is not shown to be modified, only other attributes. -->

        <form action="update_student.php" method="post">
            <input type="hidden" name="Sid" id="Sid" value="<?php echo $row['Student_id'] ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" id="name" name="name" value="<?php echo $row['Name'] ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="text" id="email" name="email" value="<?php echo $row['Email'] ?>">
            </div>
            <div class="form-group">
                <label for="classification">Classification</label>
                <input class="form-control" type="text" id="classification" name="classification" value="<?php echo $row['Student_Classification'] ?>">
            </div>
            <div class="form-group">
                <label for="major">Major</label>
                <input class="form-control" type="text" id="major" name="major" value="<?php echo $row['Student_Major'] ?>">
            </div>
            <div class="form-group">
                <label for="gpa">GPA</label>
                <input class="form-control" type="text" id="gpa" name="gpa" value="<?php echo $row['Student_GPA'] ?>">
            </div>
            <div class="form-group">
                <label for="expertise">Expertise</label>
                <input class="form-control" type="text" id="expertise" name="expertise" value="<?php echo $row['Student_Expertise'] ?>">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Update">
            </div>
        </form>
        <div>
            <br>
            <a href="student_menu.php">Back to Student Menu</a></br>
        </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>