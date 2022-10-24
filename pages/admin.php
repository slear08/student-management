<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css?v=<?php echo time(); ?>">
    <title>ADMIN</title>
</head>
<body>
    <main>
        <section class="side-bar">
            <div class="profile">
                <img src="../assets/profile.jpg" alt="profile">
            </div>
            <h1>DASHBOARD</h1>
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
            <h1>Welcome Admin, (admin name)</h1>
            <div class="content">
                <div class="add-data" id="add-record">
                    <div class="image-container">
                        <img src="../assets/add.png" alt="add folder">
                    </div>
                    <h1>ADD RECORD</h1>
                    <div class="icon-container">
                        <img src="../assets/icon1.png" alt="add icon">
                    </div>
                </div>
                <div class="update-data" id="update-record">
                    <div class="image-container">
                        <img src="../assets/update.png" alt="update folder">
                    </div>
                    <h1>UPDATE RECORD</h1>
                    <div class="icon-container">
                        <img src="../assets/icon2.png" alt="update icon">
                    </div>
                </div>
                <div class="view-data">
                    <div class="image-container">
                        <img src="../assets/view.png" alt="view folder">
                    </div>
                    <h1>VIEW RECORD</h1>
                    <div class="icon-container">
                        <img src="../assets/icon3.png" alt="view icon">
                    </div>
                </div>
                <?php 
                    // ADD FORM
                    include_once("./components/add.php");
                    include_once("./components/search.php");
                    include_once("./components/view.php");
                ?>
            </div>
        </section>
    </main>
    <script src="../js/admin.js"></script>
</body>
</html>