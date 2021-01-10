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

<!-- CSS pro Spoiler -->
<style>
    .spoiler, .spoiler2{
        color: black;
        background-color:black;
    }

    .spoiler:hover{
        color: white;
    }

    .spoiler2:hover {
        background-color:white;
    }

    .vetsi-text {
        font-size: 120%;
        margin-left: 20px;
    }
</style>

<!-- Obsah Stránky -->

<div class="jumbotron container">
    <h1>Váš účet</h1><br>
    <span class="vetsi-text" >Jméno: </span>
    <span class="vetsi-text"><?php
        if ($tplData['name']==" "){
            ?>
            <i>Jmeno Nezadano</i>
            <?php
        } else {
        echo $tplData['name'];
        }?></span>
    <br><br>
    <span class="vetsi-text" >Login: </span>
    <span class="vetsi-text"><?php echo $tplData['username'] ?></span>
    <br><br>
    <span class="vetsi-text" >E-mail: </span>
    <span class="vetsi-text"><?php echo $tplData['email'] ?></span>
    <br><br>
    <span class="vetsi-text" >Heslo: </span>
    <span class="spoiler vetsi-text"  > <?php
        echo $tplData['password']
    ?></span>
    <br><br>
    <span class="vetsi-text">Telefon: </span>
    <span class="vetsi-text"><?php echo $tplData['telefon'] ?></span>
</div>

<!-- Pomocnik / uzivatel -->
<?php if ($tplData['pravo']==3 ){ ?>
    <h1 class="container">Vaše nabídky</h1>
<?php } elseif ($tplData['pravo']==4 ) {?>
    <h1 class="container">Vybraná nabídka</h1>
<?php } ?>
<div class="container table-responsive">
<table class="table table-sm  table-bordered table-striped table-hover">
    <thead class="thead-dark text-center">
    <tr>
        <th>Jméno</th><th>Lokace</th><th>Druhy Pomoci</th><th></th>
    </tr>
    </thead>
    <tbody>
    <!-- Pokud je pomocnik -->
    <?php
    $nabidky = $tplData['nabidky'];
    if ($tplData['pravo']==3 ){
        foreach ($nabidky as $nabidka) {
        if ($nabidka['id_uzivatel']==$tplData['name']) {
            ?>
            <tr class="position-relative">
                <td><?php echo $nabidka["id_uzivatel"]; ?></td>
                <td><?php echo $nabidka["lokace"]; ?></td>
                <td>
                    <?php foreach ($tplData["pomoci".$nabidka["id_nabidka"]] as $pomocNabidky){ ?>
                        <?php
                        if ($pomocNabidky['muhrd_typy_pomoci_id_pomoci']=="Nákupy") {
                            ?><span class="badge badge-pill badge-primary">Nákupy</span><?php
                        }
                        if ($pomocNabidky['muhrd_typy_pomoci_id_pomoci']=="Společnost") {
                            ?><span class="badge badge-pill badge-secondary">Společnost</span><?php
                        }
                        if ($pomocNabidky['muhrd_typy_pomoci_id_pomoci']=="Telefonáty") {
                            ?> <span class="badge badge-pill badge-danger">Telefonáty</span><?php
                        }
                        if ($pomocNabidky['muhrd_typy_pomoci_id_pomoci']=="Dovoz") {
                            ?><span class="badge badge-pill badge-success">Dovoz</span><?php
                        }
                        if ($pomocNabidky['muhrd_typy_pomoci_id_pomoci']=="Doučování") {
                            ?><span class="badge badge-pill badge-warning">Doučování</span><?php
                        }
                        if ($pomocNabidky['muhrd_typy_pomoci_id_pomoci']=="Obecná Pomoc") {
                            ?><span class="badge badge-pill badge-info">Obecná pomoc</span><?php
                        }
                        ?>
                    <?php } ?>
                </td>
                <td class="text-center">
                    <form class="d-flex text-center" method="post">
                        <a class="btn btn-sm btn-outline-secondary" data-toggle="collapse"
                           data-target="#demo<?php echo $nabidka['id_nabidka']?>">Podrobnosti</a>
                        <button type="submit" name="zamitni"
                                value="zamitni<?php echo $nabidka['id_nabidka']?>" class="btn btn-sm btn-danger">Smazat</button>
                        <?php if($nabidka['visible']) { ?>
                            <button type="button" class="btn btn-outline-success disabled">Schvaleno</button>
                            <?php
                        } else{ ?>
                            <button type="button" class="btn btn-outline-danger disabled">Neschvaleno</button>
                            <?php
                        }
                        ?>
                    </form>
                </td>
            </tr>
            <tr>
                <div id="demo<?php echo $nabidka['id_nabidka']?>" class="collapse text-justify text-light bg-dark rounded position-relative">
                    <?php echo $nabidka['info'] ?>
                    <div>
                        Hodnocení: <?php echo $nabidka['hodnoceni'] ?>
                        <?php
                        for( $x = 0; $x < 5; $x++ )
                        {
                            if( floor( $nabidka['hodnoceni'] )-$x >= 1 )
                            { echo '<i class="fa fa-star"></i>'; }
                            elseif( $nabidka['hodnoceni']-$x > 0 )
                            { echo '<i class="fa fa-star-half-o"></i>'; }
                            else
                            { echo '<i class="fa fa-star-o"></i>'; }
                        }
                        ?>
                    </div>
                    <br>
                </div>
            </tr>
        <?php }}}
    // Pokud je uzivatel
    if ($tplData['pravo']==4){
        foreach ($nabidky as $nabidka) {
        if ($nabidka['id_nabidka']==$tplData['vybrana_nabidka']) {
             ?>
            <tr class="position-relative">
                <td><?php echo $nabidka["id_uzivatel"]; ?></td>
                <td><?php echo $nabidka["lokace"]; ?></td>
                <td>
                    <?php foreach ($tplData["pomoci".$nabidka["id_nabidka"]] as $pomocNabidky){ ?>
                        <?php
                        if ($pomocNabidky['muhrd_typy_pomoci_id_pomoci']=="Nákupy") {
                            ?><span class="badge badge-pill badge-primary">Nákupy</span><?php
                        }
                        if ($pomocNabidky['muhrd_typy_pomoci_id_pomoci']=="Společnost") {
                            ?><span class="badge badge-pill badge-secondary">Společnost</span><?php
                        }
                        if ($pomocNabidky['muhrd_typy_pomoci_id_pomoci']=="Telefonáty") {
                            ?> <span class="badge badge-pill badge-danger">Telefonáty</span><?php
                        }
                        if ($pomocNabidky['muhrd_typy_pomoci_id_pomoci']=="Dovoz") {
                            ?><span class="badge badge-pill badge-success">Dovoz</span><?php
                        }
                        if ($pomocNabidky['muhrd_typy_pomoci_id_pomoci']=="Doučování") {
                            ?><span class="badge badge-pill badge-warning">Doučování</span><?php
                        }
                        if ($pomocNabidky['muhrd_typy_pomoci_id_pomoci']=="Obecná Pomoc") {
                            ?><span class="badge badge-pill badge-info">Obecná pomoc</span><?php
                        }
                        ?>
                    <?php } ?>
                </td>
                <td class="text-center">
                    <form class="d-flex text-center" method="post">
                        <a class="btn btn-sm btn-outline-secondary" data-toggle="collapse"
                           data-target="#demo<?php echo $nabidka['id_nabidka']?>">Podrobnosti</a>
                        <button type="submit" name="zrus"
                                value="zrus" class="btn btn-sm btn-danger">Zrušit</button>
                        <input type="number" max="5" min="0" class="" name="hodnoceni" placeholder="0-5">
                        <button type="submit" name="hodnot"
                                value="hodnot<?php echo $nabidka['id_nabidka']?>" class="btn btn-sm btn-warning">Odeslat Hodnocení</button>
                    </form>
                </td>
            </tr>
            <tr>
                <div id="demo<?php echo $nabidka['id_nabidka']?>" class="collapse text-justify text-light bg-dark rounded position-relative">
                    <?php echo $nabidka['info'] ?>
                    <div>
                        Hodnocení: <?php echo $nabidka['hodnoceni'] ?>
                        <?php
                        for( $x = 0; $x < 5; $x++ )
                        {
                            if( floor( $nabidka['hodnoceni'] )-$x >= 1 )
                            { echo '<i class="fa fa-star"></i>'; }
                            elseif( $nabidka['hodnoceni']-$x > 0 )
                            { echo '<i class="fa fa-star-half-o"></i>'; }
                            else
                            { echo '<i class="fa fa-star-o"></i>'; }
                        }
                        ?>
                    </div>
                    <br>
                </div>
            </tr>
    <?php }}} ?>
    </tbody>
</table>
</div>
<!-- Tabulka, komu pomocnik pomaha -->
<?php if ($tplData['pravo']==3 ){
    ?>
    <h1 class="container">Aktuálně pomáháte uživatelům</h1>
    <div class="container table-responsive">
        <table class="table table-sm  table-bordered table-striped table-hover">
        <thead class="thead-dark text-center">
        <tr>
            <th>Jméno</th><th>Email</th><th>Telefon</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $nabidky = $tplData['nabidky'];
        $uzivatele = $tplData['uzivatele'];
        foreach ($uzivatele as $uzivatel) {
            foreach ($nabidky as $nabidka) {
                if ($nabidka['id_uzivatel']==$tplData['name']) {
                    if ($uzivatel['id_vybrana_nabidka']==$nabidka['id_nabidka']) { ?>
                        <tr class="position-relative">
                            <td><?php echo $uzivatel["jmeno"]; ?></td>
                            <td><?php echo $uzivatel["email"]; ?></td>
                            <td><?php echo $uzivatel["telefon"]; ?></td>
                        </tr>
                    <?php }
                }
            }
        } ?>
        </tbody>
        </table>
    </div>
<?php } ?>

<!-- KONEC: Obsah Stránky -->

<?php
$tplHeaders->createFooter();
?>
</body>