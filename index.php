<!DOCTYPE html>
<html>
<head>
<title>Duškina kuhinjica</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!--za responzivnost-->
    <link rel="stylesheet" href="stylezajednicki.css">
  
    <!--ubacivanje bootstrap-a-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Didact Gothic' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php
    include "povezivanje.php";
    ?>
</head>

<body>
 

    <div class="slika">
       <img src="restoran1.jpg" alt="Restoran 1"> 
      <div class="naslov">
        <h1 class="display-4">Duškina kuhinjica</h1>

        </div>
    </div>

    <div class="container-fluid">  <!--cela sirina ekrana-->
        
        <div class="row">   <!--JELOVNIK-->
            <div class="col text-center">
                <br>
                <button id="jela" type="button" class="btn btn-dark btn-lg">Prikaži jelovnik</button>
                <button id="sakrij" type="button" class="btn btn-info">Sakrij jelovnik</button> <br>
                <br>
                <button id= "sortirajPoKategorijama" type="button" class="btn btn-secondary">Sortiraj po kategoriji</button>
                <a href ="jela2.php" >Uredi jelovnik</a>
                <br>

                    <script> // dugme za sortiranje po kategoriji
                    document
                        .getElementById("sortirajPoKategorijama")
                        .addEventListener("click", function () {
                          console.log("click");
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function () {
                                if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("prikaz1").innerHTML = this.responseText;
                                }
                              
                            };
                            xmlhttp.open("GET", "jelaPoKategoriji.php", true);
                            xmlhttp.send();
                        });
                    </script>          
                <input type="text" id="pretragaJela" onkeyup="myFunction()" placeholder="Pronađi jelo...">
                <br>
                <div class="prikaz" id="prikaz1"></div>
                
                <script>    //dugme sakrij
                    document
                        .getElementById("sakrij")
                        .addEventListener("click", function () {
                            document.getElementById("prikaz1").innerHTML = ""; });
                        
                </script>
               
                <script> //dugme za prikaz tabele sa jelovnikom
                    document
                        .getElementById("jela")
                        .addEventListener("click", function () {
                          console.log("click");
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function () {
                                if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("prikaz1").innerHTML = this.responseText;
                                }
                              
                            };
                            xmlhttp.open("GET", "tabelaJela.php", true);
                            xmlhttp.send();
                        });
                </script>
                <script>
                    function myFunction() {     //funkcija za pretragu 
                      
                      var input, filter, table, tr, td, i, txtValue;
                      input = document.getElementById("pretragaJela");
                      filter = input.value.toUpperCase();
                      table = document.getElementById("prikaz1");
                      tr = table.getElementsByTagName("tr");

                      //petlja kroz redove tabele, sakriva one koji ne odgovaraju 
                      for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[1];
                        if (td) {
                          txtValue = td.textContent || td.innerText;
                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                          } else {
                            tr[i].style.display = "none";
                          }
                        }
                      }
                    }
                    </script>

                    
            </div>

            <div class="col text-center"> <!--PIĆOVNIK-->
                <br>
                
                <button id="pica" type="button" class="btn btn-dark btn-lg">Prikaži pićovnik</button>
                <button id="sakrij2" type="button" class="btn btn-info">Sakrij pićovnik</button> <br>
                <br>
                <button id= "sortirajPoKategoriji" type="button" class="btn btn-secondary">Sortiraj po kategoriji</button>
                <a href ="pica.php" >Uredi pićovnik</a>
                <input type="text" id="pretragaPica" onkeyup="myFunction1()" placeholder="Pronađi piće...">

                <div class="prikaz" id="prikaz2"></div>
                <script>  //dugme sakrij
                    document
                        .getElementById("sakrij2")
                        .addEventListener("click", function () {
                            document.getElementById("prikaz2").innerHTML = "";
                        });
                </script>
                <script>  // dugme za sortiranje po kategoriji
                    document
                        .getElementById("sortirajPoKategoriji")
                        .addEventListener("click", function () {
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function () {
                                if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("prikaz2").innerHTML = this.responseText;
                                }
                            };
                            xmlhttp.open("GET", "picaPoKategoriji.php", true);
                            xmlhttp.send();
                        });
                </script>

                <script> //dugme za prikaz tabele sa pićima
                    document
                        .getElementById("pica")
                        .addEventListener("click", function () {
                            var xmlhttp = new XMLHttpRequest();
                            xmlhttp.onreadystatechange = function () {
                                if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("prikaz2").innerHTML = this.responseText;
                                }
                            };
                            xmlhttp.open("GET", "tabelaPica.php", true);
                            xmlhttp.send();
                        });
                </script>
                 <script> //funkcija za pretragu
                    function myFunction1() {
                      
                      var input, filter, table, tr, td, i, txtValue;
                      input = document.getElementById("pretragaPica");
                      filter = input.value.toUpperCase();
                      table = document.getElementById("prikaz2");
                      tr = table.getElementsByTagName("tr");
                    
                      
                      for (i = 0; i < tr.length; i++) {
                        td = tr[i].getElementsByTagName("td")[1];
                        if (td) {
                          txtValue = td.textContent || td.innerText;
                          if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                          } else {
                            tr[i].style.display = "none";
                          }
                        }
                      }
                    }
                    </script>
            </div>
        </div>
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