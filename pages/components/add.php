<?php
    include_once("../connection/connection.php");

    $conn = connection();

    if(!isset($_SESSION)) {
        session_start();
    }


?>
<dialog class="modal" id="add-form">
    <div class="modal-title">
        <h1>ADD RECORD</h1>
    </div>
    <form method="POST" action="process.php" enctype="multipart/form-data">
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