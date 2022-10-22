<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
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
                <div class="add-data">
                    <div class="image-container">
                        <img src="../assets/add.png" alt="add folder">
                    </div>
                    <h1>ADD RECORD</h1>
                    <div class="icon-container">
                        <img src="../assets/icon1.png" alt="add icon">
                    </div>
                </div>
                <div class="update-data">
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
                <dialog class="modal" id="add-form">
                    <div class="add-title">
                        <h1>ADD RECORD</h1>
                    </div>
                    <form action="">
                        <div class="student-container">
                            <div class="title">
                                <h1>STUDENT INFORMATION</h1>
                            </div>
                            <div class="student-form">
                                <div class="col-1">
                                    <input type="text" name="student-first-name" placeholder="FIRST NAME" required>
                                    <input type="text" name="student-id" placeholder="STUDENT ID" required>
                                    <input type="text" name="year" placeholder="YEAR LEVEL" required>
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
                    </form>
                    <div class="submit-btn">
                        <button type="submit">SUBMIT</button>
                    </div>
                    <div class="close-btn">
                        <button id="close-add">CLOSE</button>
                    </div>
                </dialog>
                <!-- SEARCH -->
                <dialog class="modal" id="search-form">
                    <div class="add-title">
                        <h1>UPDATE</h1>
                    </div>
                    <form action="">
                        <input type="text" placeholder="SEARCH STUDENT ID">
                    </form>
                    <div class="submit-btn">
                        <button type="submit">SUBMIT</button>
                    </div>
                    <div class="close-btn">
                        <button id="close-search">CLOSE</button>
                    </div>
                </dialog>
                <!-- UPDATE -->
                <dialog class="modal" id="update-form">
                    <div class="add-title">
                        <h1>UPDATE DATA</h1>
                    </div>
                    <form action="">

                    </form>
                    <div class="close-btn">
                        <button id="close-btn">CLOSE</button>
                    </div>
                </dialog>
            </div>
        </section>
    </main>
</body>
<script src="/js/user.js"></script>
</html>