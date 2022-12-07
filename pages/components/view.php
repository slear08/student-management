<?php
    include_once("../connection/connection.php");
    

    function load(){
        $conn = connection();
        $studentSql = "SELECT * FROM students";
        $student = $conn->query($studentSql) or die($conn->error());

        while($studentRow = $student->fetch_assoc()){
            echo '
            <tr>
                <td>'.$studentRow["student_id"].'</td>
                <td><img src="../upload/'.$studentRow["image"].'" alt="profile"></td>
                <td>'.$studentRow["firstname"].' '.$studentRow["lastname"].'</td>
                <td>'.$studentRow["course"].'</td>
                <td>'.$studentRow["year"].'</td>
            </tr>
            ';
        }
    }
    

    if(isset($_POST['search-id'])){

        $searchID = $_POST['search-student'];

        $sql = "SELECT * FROM students WHERE student_id = '$searchID'";

        $student = $conn->query($sql) or die($conn->error);

        $row = $student->fetch_assoc();
        $result = $student->num_rows;
    
        if($result > 0){
            $_SESSION['DeleteStudent'] = $searchID;
            include_once("./components/delete.php");    
            echo '<script>
                    document.getElementById("delete-modal").showModal();
                </script>';

        }else{
            $errorMessage = "NO RESULT";
            echo '<script>
                    document.getElementById("view-table").showModal();
                </script>';
        }
        
    }
?>
<dialog class="modal view-table" id="view-table">
    <div class="modal-title">
        <h1>VIEW DATA</h1>
    </div>
    <div class="title">
        <h1>ALL STUDENT</h1>
    </div>
    <div class="search">
        <form method="post">
            <input type="number" name="search-student" placeholder="Search student ID" required> 
            <button name="search-id">SEARCH STUDENT TO DELETE</button>
        </form>
        <p><?php echo $errorMessage?></p>
    </div>
    <table class="data">
        <tr>
            <th>STUDENT ID</th>
            <th>PHOTO</th>
            <th>NAME</th>
            <th>COURSE</th>
            <th>YEAR LEVEL</th>
        </tr>
        <?php 
            load();
        ?>
    </table>
    <div class="close-btn">
        <button id="close-btn">CLOSE</button>
    </div>
</dialog>