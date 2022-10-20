<?php  
    include_once("connection/connection.php");

    $conn = connection();

    if(!isset($_SESSION)) {
        session_start();
    }
    
    $errorMessage ="";
    if(isset($_POST['login'])){
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sqlQuery = "SELECT * FROM accounts WHERE email = '$username' and   password = '$password'";

        $user = $conn->query($sqlQuery) or die($conn->error);

        $row = $user->fetch_assoc();
        $result = $user->num_rows;
        
        if($result > 0){  
            if($row["user_type"]=="admin"){
                $_SESSION['AdminName'] = $row["name"];
                header("Location: pages/admin.php");
                
            }else if($row["user_type"]=="student"){
                $_SESSION['StudentName'] = $row["name"];
                $_SESSION['StudentID'] = $row["id"];
                header("Location: pages/user.php");
            }
        }else{
            $errorMessage = "The username or password you've enter is incorrect";
        }


    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Login</title>
    <link rel="stylesheet" href="css/index.css?v=<?php echo time(); ?>">
</head>
<body>
    <main>
        <div class="hero">
            <img src="./assets/daffodils school.png" alt="hero">
        </div>
        <div class="login">
            <div class="banner">
                <div class="logo">
                    <img src="./assets/logo.png" alt="logo">
                </div>
                <div class="school-name">
                    <h1>Daffodils School</h1>
                    <p>Passion for learning </p>
                </div>
            </div>
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <label>Username</label>
                <div class="input-holder">
                    <span><img src="./assets/pen.png" alt="pen"></span>
                    <input type="text" name="username" required>
                </div>
                <label>Password</label>
                <div class="input-holder">
                    <span><img src="./assets/lock.png" alt="lock"></span>
                    <input type="password" name="password" required>
                </div>
                <p><?php echo $errorMessage?></p>
                <button type="submit" name="login">Login</button>
            </form>
            
        </div>
    </main>
</body>
</html>