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

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>STUDENT PROFILE</title>
</head>
<body>
    <main>
        <section class="side-bar">
            <div class="profile">
                <img src="../assets/profile.jpg" alt="profile">
            </div>
            <div class="profile-button">
                <button class="btn" onclick="toggleContainer()"><i class="fa fa-user"></i>Profile</button>
            </div>  
        </section>
        <section class="main-content">
            <header>
                <div class="banner">
                    <div class="logo">
                        <img src="../assets/logo.png" alt="logo">
                    </div>
                    <div class="school-name">
                        <h1>Daffodils School</h1>
                        <p>Passion for learning </p>
                    </div>
                </div>
                <div class="profile-header">
                    <img src="../assets/profile.jpg" alt="">
                </div>
                <a href="../logout.php">LOG OUT</a>
            </header>
            <div class="content">
                <div class="content-container ">
                    <div class="profile-content">
                        <img src="../assets/profile.jpg" alt="">
                    </div>
                    <div class="details">
                        <h1>Student Detail</h1>
                        <div class="student-details">
                            <p>Student ID: <?php echo $studentRow['student_id'];?></p>
                            <p>Student Name: <?php echo strtoupper($studentRow['firstname']." ".$studentRow['lastname']);?></p>
                            <p>Section: <?php echo $studentRow['section'];?></p>
                            <p>Year level: <?php echo $studentRow['year'];?></p>
                            <p>Course: <?php echo $studentRow['course'];?></p>
                        </div>
                        <h1>Parent/Guardian Detail:</h1>
                        <div class="parent-details">
                            <p>Guardian Name: <?php echo strtoupper($parentRow['name']);?></p>
                            <p>Relation: <?php echo strtoupper($parentRow['relation']);?></p>
                            <p>Contact Number: <?php echo $parentRow['contact'];?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
<script src="../js/user.js"></script>
</html>