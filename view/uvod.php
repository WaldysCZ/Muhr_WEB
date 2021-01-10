<?php
global $tplData;

require("ZakladHTML.class.php");
$tplHeaders = new ZakladHTML();

$tplHeaders->createHeader($tplData['title']);

?>

<body>
<?php
if (!$tplData['userLogged']) {
    $tplHeaders->createNav($tplData['pravo']);
} else {
    $tplHeaders->createNav($tplData['pravo'],"odhlaseni");
}
?>

<!-- Obsah Stránky -->
<div class="container-fluid">
    <!-- Carousel -->
    <div id="demo_c" class="container-fluid carousel slide" data-ride="carousel" style="max-width: 1200px">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo_c" data-slide-to="0" class="active"></li>
            <li data-target="#demo_c" data-slide-to="1"></li>
            <li data-target="#demo_c" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/help1.jpg" style="width:100%; max-height: 600px;" alt="help1">
                <div class="carousel-caption">
                    <h3 class="container carItem">Dovoz</h3>
                    <p class="container carItemP">Nabízíme dovoz pro pohybě a jinak postižené</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/help2.jpg" style="width:100%; max-height: 600px;" alt="help2">
                <div class="carousel-caption">
                    <h3 class="container carItem">Nákupy</h3>
                    <p class="container carItemP">Nakoupíme za vás všechno důležité</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/help3.jpg" style="width:100%; max-height: 600px;" alt="help3">
                <div class="carousel-caption">
                    <h3 class="container carItem">Společnost</h3>
                    <p class="container carItemP">Pomůžeme vám zabavit se</p>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo_c" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo_c" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>

    </div>
    <!-- KONEC: Carousel -->

    <!-- Uvodni text -->
    <div class="container jumbotron">
        <h2>Řekněte si o pomoc, od toho tu jsme!</h2>
        <p class="text-justify">
            Podívejte se na možné nabídky pomoci a vyberte si svého vlastního pomocníka podle vlastních preferencí, typu pomoci a hlavně lokace. Vybraný pomocník se s vámi poté spojí a společně si vyberete nejvhodnější dny a časy a domluvíte se na detailech.
            <br><br> K vybrání pomocníka je nutné být zaregistrován, proto pokud ještě nemáte učet, zaregistrujte se!
        </p>
        <div class="btn-group btn-group-lg">
            <a class="btn btn-secondary"  href="index.php?page=nabidky" >
                <span class="fa fa-external-link"></span>
                Zobrazit Nabídky
            </a>
            <a class="btn btn-outline-secondary"  href="index.php?page=faq" >
                <span class="fa fa-search"></span>
                Otázky
            </a>
            <a class="btn btn-outline-secondary" href="index.php?page=registrace">
                <span class="fa fa-address-book"></span>
                Přihlášení/Registrace
            </a>
        </div>
    </div>
    <!-- KONEC: Uvodni text -->
</div>
<!-- KONEC: Obsah Stránky -->

<?php
$tplHeaders->createFooter();
?>
</body>