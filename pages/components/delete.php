<?php
    include_once("../connection/connection.php");

    $conn = connection();

    if(!isset($_SESSION)) {
        session_start();
    }
    $studentID = $_SESSION['DeleteStudent'];

    $sql = "SELECT * FROM students WHERE student_id = '$studentID' ";
    $student = $conn->query($sql) or die($conn->error);
    $studentRow = $student->fetch_assoc();
    
?>
<dialog class="modal delete-modal" id="delete-modal">
    <div class="main-container">
        <div class="image-container">
        <?php echo '<img src="../upload/'.$studentRow["image"].'" alt="profile">'?>
        </div>
        <div class="student-info">
            <h1><?php echo strtoupper($studentRow['firstname']." ".$studentRow['lastname']);?></h1>
            <p><?php echo $studentRow['student_id'];?></p>
        </div>
        <form action="process.php" method="POST">
            <button name="delete-student">DELETE STUDENT</button>
        </form>
    </div>
    <div class="close-btn">
        <button id="close-btn">CLOSE</button>
    </div>
</dialog>