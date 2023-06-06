<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: logowanie.php");
}
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ApexPC - dashboard</title>
    <link rel="icon" type="image/x-icon" href="img/Grafika_bez_nazwy (1).png">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <h1>Witaj w panelu użytkownika</h1>
        <a href="logout.php" class="btn btn-warning">Logout</a>
        <p>Jesli nadal tu nic nie ma, oznacza to, że miłosz nic nie zrobił z panelem</p>
    </div>
</body>
</html>