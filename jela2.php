<!DOCTYPE html>
<html>
<head>
<title>Pregled jela</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="stylepica.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Didact Gothic' rel='stylesheet'>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<div class="jela">
<img src="eat.jpg" alt="Drink">
</div>

<?php

include "povezivanje.php";
if (isset ($_GET['akcija'])){
    if ($_GET['akcija'] == 'unos'){
?>


<div class= "jelopice">
<h1>Unos novog jela</h1>
<hr/>
<form method="post" action="?akcija=unos">
<label>ID :</label> <input type="text" name="ID_Jela" /><br/>
<label>Naziv :</label> <input type="text" name="Naziv" /><br/>
<label>Cena :</label> <input type="text" name="Cena" /><br/>
<label>Kategorija :</label> <input type="text" name="Kategorija" /><br/>
<input type="submit"  name="unos" value="Ubaci jelo" />
</form>
</div>


<?php
include "povezivanje.php";
if (isset($_POST["unos"])){
    if (isset($_POST['ID_Jela'])&&isset($_POST['Naziv'])&&isset($_POST['Cena'])&&isset($_POST['Kategorija'])){
    $ID_Jela = $_POST['ID_Jela'];
    $Naziv = $_POST['Naziv'];
    $Cena = $_POST['Cena'];
    $Kategorija = $_POST['Kategorija'];


$sql="INSERT INTO jela (ID_Jela,Naziv,Cena,Kategorija) VALUES ('".$ID_Jela."', '".$Naziv."', '".$Cena."', '".$Kategorija."')";
if ($mysqli->query($sql)){
    echo '<script>alert("Jelo je uspešno dodato")</script>';
    } else {
    echo '<script>alert("Nastala je greška pri dodavanju jela.")</script>';
            }
    } else {
    echo '<script>alert("Nisu prosleđeni parametri!")</script>';
}
}}}

if (isset ($_GET['akcija']) && isset ($_GET['ID_Jela'])){
    $akcija = $_GET['akcija'];
    $ID_Jela = $_GET['ID_Jela'];
    switch ($akcija){
        case "brisanje":
        $upit = "DELETE FROM jela WHERE ID_Jela = ".$ID_Jela;
        if (!$q=$mysqli->query($upit)){
        echo '<script>alert("Nastala je greška pri izvođenju upita.")</script>';
        die();
        } else {
        echo '<script>alert("Brisanje jela je uspelo.")</script>';
                }
        break;

        case "izmena_forma":
            $upit="SELECT ID_Jela, Naziv, Cena, Kategorija FROM jela WHERE ID_Jela=".$ID_Jela;
            if (!$q=$mysqli->query($upit)){
                echo '<script>alert("Nastala je greška pr izvodjenju upita.")</script>';
            die();
            } else {
            if ($q->num_rows!=1){
                echo '<script>alert("Nepostojeće jelo.")</script>';
            } else {
            $jelo = $q->fetch_object();
            $ID_Jela = $jelo->ID_Jela;
            $Naziv = $jelo->Naziv;
            $Cena = $jelo->Cena;
            $Kategorija = $jelo->Kategorija;
            ?>
            
            <div class="jelopice">
            <h1>Izmena jela</h1>
            <hr/>
            <form method="post" action="?akcija=izmena&ID_Jela=<?php echo $_GET['ID_Jela'];?>">
            <label>Naziv : </label> <input type="text" name="Naziv" value="<?php echo $Naziv;?>"/><br/>
            <label>Cena : </label> <input type="text" name="Cena" value="<?php echo $Cena;?>"/><br/>
            <label>Kategorija : </label> <input type="text" name="Kategorija" value="<?php echo $Kategorija;?>"/><br/>
            <input type="submit" name="unos" value="Potvrdi" />
            </form>
            </div>
            
            <?php
            }
            }
            break;
            
            case "izmena":
            if (isset ($_POST['Naziv']) && isset ($_POST['Cena']) && isset ($_POST['Kategorija'])){
            $Naziv = $_POST['Naziv'];
            $Cena = $_POST['Cena'];
            $Kategorija = $_POST['Kategorija'];
            
            $upit="UPDATE jela SET Naziv='". $Naziv ."', Cena='". $Cena ."', Kategorija='". $Kategorija ."' WHERE ID_Jela=". $ID_Jela;
            if ($mysqli->query($upit)){
            if ($mysqli->affected_rows > 0 ){
                echo '<script>alert("Podaci su izmenjeni.")</script>';
            } else {
                echo '<script>alert("podaci nisu izmenjeni.")</script>';
            }
            } else {
                echo '<script>alert("Greška pri izmeni.")</script>';
            }
            } else {
                echo '<script>alert("Nisu prosledjeni parametri.")</script>';
            }
            break;

        default:
        echo '<script>alert("Nepostojeća akcija!")</script>';
        break;
        }
}


$sql="SELECT ID_Jela, Naziv, Cena, Kategorija FROM jela";
if (!$q=$mysqli->query($sql)){
    echo '<script>alert("Nastala je greška pri izvođenju upita")</script>';
    die();
    }
    if ($q->num_rows==0){
    echo '<script>alert("Nema jela za prikaz!")</script>';
    } else {
?>

<div class="jelopice">
<h1>Jelovnik</h1> 

<hr/>
<table class="table table-striped table-dark " style="width:60%">
<thead>
<th><b>Redni broj</b></th>
<th><b>Naziv</b></th>
<th><b>Cena</b></th>
<th><b>Kategorija</b></th>
</thead>

<?php
while ($red=$q->fetch_object()){
?>
<tr>
<td><?php echo $red->ID_Jela; ?></td>
<td><?php echo $red->Naziv; ?></td>
<td><?php echo $red->Cena; ?></td>
<td><?php echo $red->Kategorija; ?></td>
<td><a href="jela2.php?akcija=izmena_forma&ID_Jela=<?php echo $red->ID_Jela; ?>">Izmena</a></td>
<td><a href="jela2.php?akcija=brisanje&ID_Jela=<?php echo $red->ID_Jela; ?>">Brisanje</a></td>
</tr>
<?php
}
?>
</table>
<?php
}
$mysqli->close();
?>
<p><a href="jela2.php?akcija=unos">Unesi novo jelo, izmeni ili obriši</a></p>
<br>
</div>



<footer>
  <p>Duškina kuhinjica<br>
  <p>Pariske komune, Novi Beograd<br>
 

<a href="https://sr-rs.facebook.com/" class="fa fa-facebook"></a>
<a href="https://twitter.com/?lang=sr" class="fa fa-twitter"></a>
<a href="https://www.instagram.com/" class="fa fa-instagram"></a>
<a href="https://www.pinterest.com/" class="fa fa-pinterest"></a>
</footer>
</body>
</html>