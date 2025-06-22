<?php
$xml = simplexml_load_file('Cards.xml');
session_start();
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
    p{
        margin:0px;
    }
    main {
    padding: 20px;
}
.forma{
    margin: auto;
    width: 20%;
    height: auto;
    border: solid 3px black;

}
.forma>form{
    padding: 20px;
    text-align: center;
}
.forma>a{
    position: absolute;
    padding-top: 5px;
}
.forma>legend{
    margin-top: 10px;
    margin-left: 10px;
}
form>label,input{
    margin: 8px;
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
        <div class="forma" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <legend>Prijava</legend>
        <form method="post">
            <label>Korisničko ime</label><br>
            <input name="kime" type="text" required ><br>
            <label>Lozinka</label><br>
            <input name="lozinka" type="text" required ><br>
            <input type="submit" value="Prijava">
        </form>
        <a href="Registracija.php">Registracija</a>
        </div>
    </main>
</body>
</html>
<?php
$hash_iz_baze="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime=$_POST ['kime'];
    $lozinka=$_POST ['lozinka'];
    $conn=new mysqli("localhost", "root","","projekt");
    $hash_iz_baze="";
    $privilegija="";
    $pime="";
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT ImeKorisnika , Lozinka, Privilegije FROM korisnici Where ImeKorisnika='$ime'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $pime=$row["ImeKorisnika"];
    $hash_iz_baze=$row["Lozinka"];
    $privilegija=$row["Privilegije"];
  }

}

if (password_verify($lozinka, $hash_iz_baze)){
      $_SESSION['username'] = $pime;
      $_SESSION['level'] = $privilegija;     
      $url = "Profil.php";
      header('Location: '.$url);
    }
else{
  echo "<br><p style='margin: auto;width: 20%;'><b>Krivo unešeno korisnočko ime ili lozinka</b></p>";
}
}
if($_SESSION['username']!=""){
  echo "<script>function provjera(){document.getElementById('navj').style.visibility='hidden';document.getElementById('navd').style.visibility='visible';document.getElementById('navt').style.visibility='visible';}</script>";
}
else{

}

?>