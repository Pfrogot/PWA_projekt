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
</style>
<body onload="provjera()">
<div class="bg-info  ">
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
<h1 style="margin-left:20px">Popis Pokemon karata: </h1>
       <?php $broj=0;$prosli="";$red=1?>
       <div style="display: flex;flex-wrap: wrap;flex-direction: row;margin:0px 20px;border:5px solid black;padding:10px;positio;">
            <?php foreach ($xml->Card as $card): ?>
                    <?php $role = $card->attributes();?>
                    <?php if($role=="pokemon"){ ?>
                    <div style="margin:5px;width:205px" id="<?php echo $broj?>" onmouseleave="detalji_makni(document.getElementById('<?php echo $broj?>'))" onmouseenter="detalji(document.getElementById('<?php echo $broj?>'))">
                    <?php echo "<label>$card->Name</label>"; ?><br>
                    <?php $img=$card->Image;echo "<img width='190' height='200' src='images/$img.jpg'>";?><br>
                    <?php echo "<p style='visibility:hidden;'>Pokemon type:$card->Type</p>";?>
                    <?php echo "<p style='visibility:hidden;'>Card type:".$card->CardInfo->SubType."</p>" ;?>
                    <?php $broj++;?> 
                    </div> 
                    <?php }?>   
                <?php endforeach;if($_SESSION['username']!=""){
                       echo "<script>function provjera(){document.getElementById('navj').style.visibility='hidden';document.getElementById('navd').style.visibility='visible';document.getElementById('navt').style.visibility='visible';}</script>";}
                    else{
                        $_SESSION['username']="";
                    } ?>
        </div>
</body>
<script>
    function detalji(element){
        document.body.children[2].children[element.id].children[4].style.visibility="visible" 
        document.body.children[2].children[element.id].children[5].style.visibility="visible"
}  
    function detalji_makni(element){
        document.body.children[2].children[element.id].children[4].style.visibility="hidden"
        document.body.children[2].children[element.id].children[5].style.visibility="hidden"
}  


</script>
</html>