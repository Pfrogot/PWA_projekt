<?php
$xml = simplexml_load_file('Cards.xml');
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
<body>
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
        <li class="nav-item">
          <a class="nav-link" href="Prijava_Registracija.php">Prijava/Registracija</a>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</div>
    <main>
        <div class="forma">
            <legend>Registracija</legend>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <label>Email</label><br>
            <input name="email" type="text"><br>
            <label>Broj telefona</label><br>
            <input name="telefon" type="text"><br>
            <label>Korisničko ime</label><br>
            <input name="kime" type="text"><br>
            <label>Lozinka</label><br>
            <input name="lozinka" type="text"><br>
            <input type="radio" name="privilegija" value="korisnik">
            <label>Korisnik</label>
            <input type="radio" name="privilegija" value="admin">    
            <label>Admin</label><br>  
            <input type="submit" value="Registracija">
        </form>
        </div>
    </main>
</body>
</html>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime=$_POST ['kime'];
    $lozinka=$_POST ['lozinka'];
    $hash_lozinka=password_hash($lozinka, CRYPT_BLOWFISH);
    $email=$_POST ['email'];
    $telefon=$_POST ['telefon'];
    $privilegija=$_POST ['privilegija'];
    $conn=new mysqli("localhost", "root","","projekt");
    $stmt = $conn->prepare("INSERT INTO korisnici (ImeKorisnika, Lozinka, Email,Telefon,Privilegije) VALUES (?, ?, ?, ?,?)");
    $stmt->bind_param("sssis", $ime, $hash_lozinka, $email, $telefon, $privilegija);
    $stmt->execute();
    echo "<p style='margin: auto;width: 20%;'><b>Uspješno kreiran račun</b></p>";
    $stmt->close();
    $conn->close();
}
?>