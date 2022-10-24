<?php
    include_once("../connection/connection.php");

    $conn = connection();

    if(!isset($_SESSION)) {
        session_start();
    }

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
            echo '<script>
                    alert("Success")
                    window.location = "/portal/pages/admin.php";
                  </script>';

        }else{
            echo "Error: <br>" . $conn->error;
        }

        $conn->close();

    }

?>
<dialog class="modal" id="add-form">
    <div class="modal-title">
        <h1>ADD RECORD</h1>
    </div>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" enctype="multipart/form-data">
        <div class="student-container">
            <div class="title">
                <h1>STUDENT INFORMATION</h1>
            </div>
            <div class="student-form">
                <div class="col-1">
                    <input type="text" name="student-first-name" placeholder="FIRST NAME" required>
                    <input type="text" name="student-id" placeholder="STUDENT ID" required>
                    <input type="text" name="year" placeholder="YEAR LEVEL" required>
                    <input type="text" name="email" placeholder="EMAIL@example.com" required>
                </div>
                <div class="col-2">
                    <input type="text" name="student-last-name" placeholder="LAST NAME" required>
                    <input type="text" name="section" placeholder="SECTION" required>
                    <input type="text" name="course" placeholder="COURSE" required>
                </div>
            </div>
        </div>
        <div class="upload-container">
            <label>UPLOAD PROFILE</label>
            <input type="file" id="image" name="image">
        </div>
        <div class="guardian-container">
            <div class="title">
                <h1>GUARDIAN DETAILS</h1>
            </div>
            <div class="guardian-form">
                <div>
                    <input type="text" name="guardian-first-name" placeholder="FIRST NAME" required>
                    <input type="text" name="guardian-last-name" placeholder="LAST NAME" required>
                </div>
                <div>
                    <input type="text" name="relation" placeholder="RELATION" required>
                    <input type="text" name="contact" placeholder="CONTACT NUMBER" required>
                </div>
            </div>
        </div>
        <div class="submit-btn">
            <button type="submit" name="submit">SUBMIT</button>
        </div>  
    </form>
    <div class="close-btn">
        <button id="close-btn">CLOSE</button>
    </div>
 </dialog>