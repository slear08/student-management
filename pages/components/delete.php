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
        <?php
            $image = $studentRow['image'];
            $imagePath = "../upload/".$image;
            if(isset($_POST['delete'])){
                $sql1 = "DELETE FROM students WHERE student_id = '$studentID'";
                $sql2 = "DELETE FROM accounts WHERE id = '$studentID'";
                $sql3 = "DELETE FROM guardians WHERE guardian_id = '$studentID'";
                if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE){
                    unlink($imagePath);
                    echo '<script>
                    document.getElementById("delete-message").showModal();
                  </script>';
                }
            }
        ?>
        <form action="" method="post">
            <button name="delete">DELETE STUDENT</button>
        </form>
    </div>
    <div class="close-btn">
        <button id="close-btn">CLOSE</button>
    </div>
</dialog>