<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ApexPC</title>
    <link rel="icon" type="image/x-icon" href="apexLogo.png">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header class="header">
		<h1 class="logo"><a href="main.php">ApexPC&trade;</a></h1>
          <ul class="main-nav">
            <li><a href="#onas">O nas</a></li>
            <li><a href="#kontakt">Kontakt</a></li>
            <li><a href="#zamowienia">Zamówienia</a></li>
            <li><a href="logowanie.php">Logowanie</a></li>
            <li><a href="rejestracja.php">Rejestracja</a></li>
      </ul>
	</header> 
    <div id="id1">
        <img id="obz" src="img/apexLogo.png" alt="logo">
        </br></br></br>
    </div>

    <div id="komputa">
        <h1 id="komputa">Tutaj złożysz własny komputer!</h1>
        <button><a href="logowanie.php" class="buttext">LOGOWANIE</a></button><button><a href="rejestracja.php" class="buttext">REJESTRACJA</a></button>
    </div></br></br></br></br></br></br></br></br></br>

    <div id="onas">
        <a id="onas"></a>
        <h1>O nas:</h1></br>
        Grupa 4 niezawodnych uczniów klasy pierwszej,</br>
        uczących się w Zespole Szkół Elektronicznych</br>
        i Telekomunikacyjnych w Olsztynie. Do naszej</br>
        grupy należą:</br></br><span class="imie">Nataniel Sypko</span> - błyskotliwy,
        inteligentny, lecz momentami chamski, reprezentuje się w naszym
        projekcie jako lider.</br></br><span class="imie">Sarnacki Wiktor</span>
        - utalentowany i artystycznie, i technicznie
        jednak często leniwy. </br></br><span class="imie">Samuel Piekarski</span> -
        Jako certyfikowany Jezus dba o nasze
        bezpieczeństwo i dobry humor oraz nasze bazy danych.
        W wolnym czasie daje znać co dzieje się w
        bursie.</br></br><span class="imie">Radkiewicz Miłosz</span> - maskotka grupy,
        jednak osoba, bez której nawet byśmy nie
        zaczeli projektu. Do tego zapewnia pozytywną
        atmosferę i motywuje do projektu, chociaż czasem brak mu zaangażowania.</br>
    </div><br></br></br></br></br></br></br></br></br></br>

    <div id="zamowienia">
        <a id="zamowienia"></a>
        <h1>Lista zamówień:</h1></br>

        <?php
        $conn = mysqli_connect("localhost", "root", "", "ApexDB");

        $sql = "SELECT * FROM panel";

        $result = $conn->query($sql);

        echo "<table>";
        echo "<tr><th>CPU</th><th>GPU</th><th>Wielkość dysku</th></tr>";

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {   

            echo "<tr><td>";
            echo $row['cpu'];
            echo "</td><td>";
            echo $row['gpu'];
            echo "</td><td>";
            echo $row['dysk'];
            echo "</td></tr>";
        }

        echo "</table>"

        ?>

    </div><br></br></br></br></br></br></br></br></br></br>

    <footer>
        <h1 id="kontakta">Kontakt</h1>
        <ul id="tk">

            <a id="kontakt"></a>
            <ol id="kontakt"><img id="dc" src="img/discord.png" alt="ikona Discord"></ol>
            <ol id="kontakt">ApexPC#0000</ol>
            <ol id="kontakt"><img src="img/poczta.png" alt="ikona poczty"></ol>
            <ol id="kontakt">kontakt@apexpc.pl</ol>
            <ol id="kontakt"><img id="tel" src="img/telefon.png" alt="ikona telefonu"></ol>
            <ol id="kontakt">(+48) 666 777 666</ol>
        </ul>
        <p>ApexPC&trade;, Made in Poland</p>
    </footer>





</html>