<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * This file deletes a record  from the table Student of your DB.
 */
-->


<?php 

session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_GET['Iid'])){

    $iid = $_GET['Iid'];
    $currentSid = $_SESSION['id'];
    $query = "INSERT INTO PURSUES VALUES('".$currentSid."', '".$iid."');";

    if ($conn->query($query) === TRUE) {
        echo "Sucessfully applied for internship!";
        header("Location: internships_apply.php");
     } else {
        echo "ERROR";
        $error = 1;
        header("Location: view_internships.php?err=$error");
     }
} else{
    echo "No Iid received";
    header("Location: view_internships.php");
}

?>