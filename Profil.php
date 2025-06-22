<?php
$xml = simplexml_load_file('Cards.xml');
session_start();
    $ime=$_SESSION['username'];
    $kime="";
    $email="";
    $telefon="";
    $privilegija="";
    $conn=new mysqli("localhost", "root","","projekt");
    $sql = "SELECT ImeKorisnika , Email, Telefon ,Privilegije FROM korisnici Where ImeKorisnika='$ime'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    $kime=$row["ImeKorisnika"];
    $email=$row["Email"];
    $telefon=$row["Telefon"];
    $privilegija=$row["Privilegije"];
  }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<style>
    main {
    padding: 20px;
}
.forma{
    margin: auto;
    width: 50%;
    height: auto;
    border: solid 3px black;

}
.forma>form{
    padding: 20px;
    text-align: center;
}
.forma>legend{
    margin-top: 10px;
    margin-left: 10px;
}
.forma>label{
    margin-left: 40px;
    margin-bottom: 5px;
}
</style>
<body onload="provjera()">
<div class="bg-info">
<nav class="navbar navbar-expand-lg bg-body-tertiary-info  ">
  <div  class="container-fluid ">
    <a class="navbar-brand" href="#">Plavao karte</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mtg_karte.php">MTG karte</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pokemon_karte.php">Pokemon karte</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="yugioh_karte.php">Yu-gi-oh karte</a>
        </li>
        <li id="navj" class="nav-item">
          <a class="nav-link" href="Prijava_Registracija.php">Prijava/Registracija</a>
        </li>
        <li  id="navd" style="visibility: collapse;" class="nav-item">
          <a class="nav-link" href="Profil.php">Profil</a>
        </li>
        <li  id="navt" style="visibility: collapse;" class="nav-item">
          <a class="nav-link" href="Odjava.php">Odjava</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</div>
    <main id="sve">
        <div class="forma">
            <legend><?php echo"Dobro došli ".$_SESSION['username'];?></legend>
            <img width="200px;" height="200px" src="https://static.vecteezy.com/system/resources/previews/005/544/718/non_2x/profile-icon-design-free-vector.jpg"><br>
            <label>Korisnicko ime: <?php echo $kime?></label><br>
            <label>Email: <?php echo $email?></label><br>
            <label>Telefon: <?php echo $telefon?></label><br>
            <label>Privilegije: <?php echo $privilegija?></label><br>
            <form method="post"><input onload="prikaz()" id="froa" style="visibility: hidden;" type="submit" value="Pregled korisnika"></form>
        </div>
    </main>
</body>
</html>
<?php
if($_SESSION['username']!="" && $_SESSION['level']=="admin"){
  echo "<script>function provjera(){document.getElementById('navj').style.visibility='hidden';document.getElementById('navd').style.visibility='visible';document.getElementById('navt').style.visibility='visible';document.getElementById('froa').style.visibility='visible';}</script>";
}
else{
  echo "<script>function provjera(){document.getElementById('navj').style.visibility='hidden';document.getElementById('navd').style.visibility='visible';document.getElementById('navt').style.visibility='visible';}</script>";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$sql = "SELECT id,ImeKorisnika, Privilegije FROM korisnici";
$result = $conn->query($sql);
  echo "<div style='border: 1px solid black;width:49%;margin:auto' class='container'>
        <table class='table'>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Ime Korisnika</th> 
                    <th>Privilegija</th> 
                </tr>
            </thead>
            <tbody>";
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["id"]. "</td>". "<td>".$row["ImeKorisnika"]. "</td>" . "<td>".$row["Privilegije"]. "</td></tr>"; 
  }

}

  echo "
            </tbody>
        </table>
    </div>";
}
?>   