<?php

    include_once("../connection/connection.php");

    $conn = connection();

    if(!isset($_SESSION)) {
        session_start();
    }

    $studentID = $_SESSION['StudentID'];

    
    $studentSql = "SELECT * FROM students where student_id ='$studentID'";
    $student = $conn->query($studentSql) or die($conn->error());
    $studentRow = $student->fetch_assoc();

    $parentSql = "SELECT * FROM guardians where guardian_id ='$studentID'";
    $parent = $conn->query($parentSql) or die($conn->error());
    $parentRow = $parent->fetch_assoc();

    $emailSql = "SELECT * FROM accounts where id ='$studentID'";
    $email = $conn->query($emailSql) or die($conn->error());
    $emailRow = $email->fetch_assoc();

?>


<dialog class="modal" id="update-form">
    <div class="modal-title">
        <h1>UPDATE DATA</h1>
    </div>
    <form action="">
        <div class="student-container">
            <div class="title">
                <h1>STUDENT INFORMATION</h1>
            </div>
            <div class="student-form">
                <div class="col-1">
                    <input type="text" name="student-first-name" placeholder="FIRST NAME" value="<?php echo $studentRow['firstname'];?>" required>
                    <input type="text" name="student-id" placeholder="STUDENT ID" value="<?php echo $studentRow['student_id'];?>" required>
                    <input type="text" name="year" placeholder="YEAR LEVEL" value="<?php echo $studentRow['year'];?>" required>
                    <input type="text" name="email" placeholder="EMAIL@example.com" value="<?php echo $emailRow['email'];?>" required>
                </div>
                <div class="col-2">
                    <input type="text" name="student-last-name" placeholder="LAST NAME" value="<?php echo $studentRow['lastname'];?>" required>
                    <input type="text" name="section" placeholder="SECTION" value="<?php echo $studentRow['section'];?>" required>
                    <input type="text" name="course" placeholder="COURSE" value="<?php echo $studentRow['course'];?>" required>
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
                    <input type="text" name="guardian-first-name" placeholder="FIRST NAME" value="<?php echo $parentRow['firstname'];?>" required>
                    <input type="text" name="guardian-last-name" placeholder="LAST NAME" value="<?php echo $studentRow['lastname'];?>" required>
                </div>
                <div>
                    <input type="text" name="relation" placeholder="RELATION" value="<?php echo $parentRow['relation'];?>" required>
                    <input type="text" name="contact" placeholder="CONTACT NUMBER" value="<?php echo $parentRow['contact'];?>" required>
                </div>
            </div>
        </div>
    </form>
    <div class="submit-btn">
        <button type="submit">UPDATE</button>
    </div>
    <div class="close-btn">
        <button id="close-btn">CLOSE</button>
    </div>
</dialog>