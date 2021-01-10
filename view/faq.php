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

<!-- Obsah FAQ -->
<div class="container jumbotron">
    <h1>FAQ / Často kladené otázky</h1>
    <p> Rozklikněte si odpovědi pro otázky</p>
    <h2>Hlavní otázky</h2>
    <div id="accordion">

        <div class="card">
            <div class="card-header">
                <a class="card-link text-dark font-weight-bold" data-toggle="collapse" href="#collapseOne">
                    Opravdu to funguje?
                </a>
            </div>
            <div id="collapseOne" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    Ano
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <a class="card-link text-dark font-weight-bold" data-toggle="collapse" href="#collapseTwo">
                    Platí se za pomocníka?
                </a>
            </div>
            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    Pomocníci si můžou říct o peněžní odměnu, ovšem většina z nich pracuje zadarmo a záleží tak jen na domluvě
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <a class="card-link text-dark font-weight-bold" data-toggle="collapse" href="#collapseThree">
                    Účtuje si web za své služky nebo za provoz účtu?
                </a>
            </div>
            <div id="collapseThree" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    Ne, fungujeme zcela zdarma, jediný, kdo si může účtovat, je samotný pomocník.
                </div>
            </div>
        </div>

    </div>
    <br>
    <h2>Vedlejší otázky</h2>
    <div id="accordion2">

        <div class="card">
            <div class="card-header">
                <a class="card-link text-dark font-weight-bold" data-toggle="collapse" href="#collapse1">
                    Kde všude fungujou služby?
                </a>
            </div>
            <div id="collapse1" class="collapse" data-parent="#accordion2">
                <div class="card-body">
                    Všechno záleží na dostupných lokalitách pomocníků.
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <a class="card-link text-dark font-weight-bold" data-toggle="collapse" href="#collapse2">
                    Nabízíte i jiné služby, které nejsou v nabídkách?
                </a>
            </div>
            <div id="collapse2" class="collapse" data-parent="#accordion2">
                <div class="card-body">
                    Všechno si musíte domluvit s pomocníky, my pouze poskytujeme platformu pro spojení mezi vámi.
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <a class="card-link text-dark font-weight-bold" data-toggle="collapse" href="#collapse3">
                    Proč to vůbec děláte?
                </a>
            </div>
            <div id="collapse3" class="collapse" data-parent="#accordion2">
                <div class="card-body">
                    Chceme pomoci lidem v nouzi a sami teďka nemáme co dělat.
                </div>
            </div>
        </div>

    </div>
</div>
<br><br>
<!-- Konec FAQ -->

<?php
$tplHeaders->createFooter();
?>
</body>
