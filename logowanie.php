<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ApexPC</title>
    <link rel="icon" type="image/x-icon" href="apexLogo.png">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header class="header">
		<h1 class="logo"><a href="main.php">ApexPC&trade;</a></h1>
          <ul class="main-nav">
            <li><a href="logowanie.php">Logowanie</a></li>
            <li><a href="rejestracja.php">Rejestracja</a></li>
      </ul>
	</header> 
    <div id="id1">
        <img id="obz" src="img/apexLogo.png" alt="logo">
        </br></br></br>
    </div>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: dashboard.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Hasło nie pasuje</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email nie pasuje</div>";
            }
        }
        ?>
        <h1>Logowanie</h1>
        <form action="logowanie.php" method="post">
            <div class="form-group">
            <i class="fa-solid fa-envelope"></i> <input type="email" placeholder="Podaj email:" name="email" class="form-control">
            </div>
            <div class="form-group">
            <i class="fa-solid fa-lock"></i> <input type="password" placeholder="Podaj hasło:" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Zaloguj się" name="login" class="button">
            </div>
        </form>
        <div>
            <p>Jeszcze nie zarejestrowany? <a href="rejestracja.php">Zrób to tutaj!</a></p>
    </br>
            <p><a href="main.php"><i class="fa-solid fa-house"></i>Strona główna</a></p>
        </div>
    </div>
</body>

</html>