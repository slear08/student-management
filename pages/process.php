<?php 
    include_once("../connection/connection.php");

    $conn = connection();
    if(!isset($_SESSION)) {
        session_start();
    }

    //ADD DATA
    if(isset($_POST['submit'])){

        // capture the information

        // Studnet information
        $studentID= $_POST['student-id'];
        $studentFirstName = $_POST['student-first-name'];
        $studentLastName = $_POST['student-last-name'];
        $section = $_POST['section'];
        $year= $_POST['year'];
        $course = $_POST['course'];
        $email = $_POST['email'];

        // Guardian information
        $guardianFirstName = $_POST['guardian-first-name'];
        $guardianLastName = $_POST['guardian-last-name'];
        $relation = $_POST['relation'];
        $contact = $_POST['contact'];

        // Image upload
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "../upload/" . $filename;
        

        // Generate password
        $password = bin2hex(openssl_random_pseudo_bytes(5));

        // Queries for
        // student information
        // guardian information
        // account information
        $sql1 = "INSERT INTO `students`(`student_id`, `firstname`, `lastname`, `year`, `section`, `course`, `image`) VALUES ('$studentID','$studentFirstName','$studentLastName','$year','$section','$course','$filename')"; 

        $sql2 = "INSERT INTO `accounts`(`id`, `name`, `email`, `password`, `user_type`) VALUES ('$studentID','$studentFirstName','$email','$password','student')";

        $sql3 = "INSERT INTO `guardians`(`guardian_id`, `firstname`, `lastname`, `relation`, `contact`) VALUES ('$studentID','$guardianFirstName','$guardianLastName','$relation','$contact')"; 
        

        if(mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)){

            move_uploaded_file($tempname, $folder);     
            include_once("admin.php");
            echo '<script>
                    document.getElementById("add-message").showModal();
                  </script>';

        }else{
            echo "Error: <br>" . $conn->error;
        }
        header("Location: admin.php");

    }




    
    // UPDATE DATA
    if(isset($_POST['update'])){
       
        $updateID = $_SESSION['StudentID'];
        // Studnet information
        $studentID= $_POST['student-id'];
        $studentFirstName = $_POST['student-first-name'];
        $studentLastName = $_POST['student-last-name'];
        $section = $_POST['section'];
        $year= $_POST['year'];
        $course = $_POST['course'];
        $email = $_POST['email'];

        // Guardian information
        $guardianFirstName = $_POST['guardian-first-name'];
        $guardianLastName = $_POST['guardian-last-name'];
        $relation = $_POST['relation'];
        $contact = $_POST['contact'];

        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "../upload/".$filename;
        
        if ($_FILES['image']['size'] > 0 ){
               // Image upload
            $imageQuery = "SELECT `image` FROM `students` WHERE `student_id`='$updateID'";
            $oldImage= $conn->query($imageQuery) or die($conn->error());
            $imageRow = $oldImage->fetch_assoc();
            $unlinkFolder = "../upload/";
            unlink($unlinkFolder.$imageRow["image"]);
            $imageSql = "UPDATE `students` SET `image`='$filename' WHERE `student_id`='$updateID'";
            move_uploaded_file($tempname, $folder);   
            mysqli_query($conn, $imageSql);
        }
        
        $sql1 = "UPDATE `students` SET `student_id`='$studentID',`firstname`='$studentFirstName',`lastname`='$studentLastName',`year`='$year',`section`='$section',`course`='$course' WHERE `student_id`='$updateID'";

        $sql2= "UPDATE `guardians` SET `guardian_id`='$studentID',`firstname`='$guardianFirstName',`lastname`='$guardianLastName',`relation`='$relation',`contact`='$contact' WHERE `guardian_id`='$updateID'";

        $sql3 = "UPDATE `accounts` SET `id`='$studentID',`name`='$studentFirstName',`email`='$email' WHERE id='$updateID'";    

        if(mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)){
            include_once("admin.php");
            echo '<script>
                    document.getElementById("update-message").showModal();
                  </script>';
        }else{
            echo "Error: <br>" . $conn->error;
        }

    }

?>