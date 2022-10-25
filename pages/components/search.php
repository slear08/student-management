<?php
    include_once("../connection/connection.php");

    $conn = connection();

    if(!isset($_SESSION)) {
        session_start();
    }
    $errorMessage = "";
    if(isset($_POST['search'])){

        $searchID = $_POST['search-student'];

        $sql = "SELECT * FROM students WHERE student_id = '$searchID' ";

        $student = $conn->query($sql) or die($conn->error);

        $row = $student->fetch_assoc();
        $result = $student->num_rows;
       
        if($result > 0){  
            $_SESSION['StudentID'] = $row["student_id"];
            include_once("./components/update.php");
            echo '<script>
                    document.getElementById("update-form").showModal();
                  </script>';
        }else{
            $errorMessage = "No result found";
        }
    } 
?>
<dialog class="modal search-form" id="search-form">
    <div class="modal-title">
        <h1>SEARCH</h1>
    </div>
    <div class="form-container">
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <input type="text" name="search-student" placeholder="SEARCH STUDENT ID" required>
            <div><p style="color:red;"><?php echo $errorMessage?></p><div>
        </form>
        
        <div class="submit-btn">
            <button type="submit" name="search" id="search-btn">SEARCH</button>
        </div>
    </div>
    <div class="close-btn">
        <button id="close-btn">CLOSE</button>
    </div>
</dialog>