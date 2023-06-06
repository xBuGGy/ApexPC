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
    <link rel="icon" type="image/x-icon" href="Grafika_bez_nazwy (1).png">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="tab">
        <ul id="banner">
            <li style="float:left"><a class="active" href="main.php">Strona główna</a></li>
        </ul>
    </div>
    <div id="id1">
        <img id="obz" src="img/Grafika_bez_nazwy (1).png" alt="logo">
        </br></br></br>
    </div>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $fullName = $_POST["userName"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeatPassword"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"Wszystkie pola są wymagane!");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email nie jest poprawny");
           }
           if (strlen($password)<8) {
            array_push($errors,"Hasło musi mieć min. 8 znaków");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Hasła nie są takie same!");
           }
           require_once "database.php";
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Na ten email zostało już zarejestrowane konto!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO users (userName, email, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>Zostałeś pomyślnie zarejestrowany!</div>";
            }else{
                die("Ups! Coś nie wyszło...");
            }
           }
          

        }
        ?>
        <h1>Rejestracja</h1>

        <form action="rejestracja.php" method="post">
            <div class="form-group">
            <i class="fa-solid fa-user"></i> <input type="text" class="form-control" name="userName" placeholder="Nazwa użtkownika:">
            </div>
            <div class="form-group">
            <i class="fa-solid fa-envelope"></i> <input type="email" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
            <i class="fa-solid fa-lock"></i> <input type="password" class="form-control" name="password" placeholder="Hasło:">
            </div>
            <div class="form-group">
            <i class="fa-solid fa-lock"></i> <input type="password" class="form-control" name="repeatPassword" placeholder="Powtórz hasło:">
            </div>
            <div class="form-btn">
                <input type="submit" class="button" value="Zarejestruj się" name="submit">
            </div>
        </form>
        <div>
        <div>
            <p>Masz już konto? <a href="logowanie.php">Zaloguj się tutaj!</a></p>
    </br>
            <p><a href="main.php"><i class="fa-solid fa-house"></i>Strona główna</a></p>
        </div>
        </div>
    </div>
</body>

</html>