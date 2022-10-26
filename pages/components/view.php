<?php
    include_once("../connection/connection.php");

    $conn = connection();

    $studentSql = "SELECT * FROM students";
    $student = $conn->query($studentSql) or die($conn->error());

?>
<dialog class="modal view-table" id="view-table">
    <div class="modal-title">
        <h1>VIEW DATA</h1>
    </div>
    <div class="title">
        <h1>ALL STUDENT</h1>
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
        ?>
    </table>
    <div class="close-btn">
        <button id="close-btn">CLOSE</button>
    </div>
</dialog>