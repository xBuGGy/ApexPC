<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: logowanie.php");
}

require("database.php");

?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ApexPC - dashboard</title>
    <link rel="icon" type="image/x-icon" href="img/apexLogo.png">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header class="header">
		<h1 class="logo"><a href="main.php">ApexPC&trade;</a></h1>
          <ul class="main-nav">
            <li><a href="logowanie.php">Logowanie</a></li>
            <li><a href="rejestracja.php">Rejestracja</a></li>
            <li><a href="logout.php" class="btn btn-warning">Wyloguj się</a></li>
      </ul>
	</header> 
    <div class="container">
</br></br></br></br></br></br></br></br></br></br></br></br>
        <h1>Witaj w panelu użytkownika!</h1>
        <div class="form-container">
        <form id="contact_form" method="post" action="formuser.php">
            <div class="mb-3 form-row">
                <div class="mr-3 form-col">
                    <label for="cpu">CPU:</label>
                    <input type="text" name="cpu" id="cpu" placeholder="Wpisz model:" />
                </div>
                </br>
                <div class="mr-3 form-col">
                    <label for="gpu">CPU:</label>
                    <input type="text" name="gpu" id="gpu" placeholder="Wpisz model:" />
                </div>
                </br>
                <div class="mr-3 form-col">
                    <label for="dysk">Dysk:</label>
                    <input type="number" name="dysk" id="dysk" placeholder="Wpisz rozmiar:" />
                </div>
                </br>
            <div class="mb-3">
               <button class="btnx" type="submit">Wyslij formularz</button>
            </div>
        </form>
        </div>
        <a href="logout.php" class="btn btn-warning" id="butus">Wyloguj się</a>
    </div>
</body>
</html>