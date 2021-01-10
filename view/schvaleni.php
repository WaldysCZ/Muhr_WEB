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
<div class="container jumbotron">
    <h1> Schvalování </h1>
    <p>Prozkoumejte nové nabídky a vyberte, které schválíte a které odstraníte</p>
    <p>
        <span class="stars" data-rating="4" ></span>
    </p>
</div>

<!-- Tabulka s nabídkami -->
<div class="container table-responsive">
    <table class="table table-sm  table-bordered table-striped table-hover">
        <thead class="thead-dark text-center">
        <tr>
            <th>Jméno</th><th>Lokace</th><th>Druhy Pomoci</th><th></th>
        </tr>
        </thead>
        <tbody>

        <?php
        $nabidky = $tplData['nabidky'];
        foreach ($nabidky as $nabidka) {
            if ($nabidka['visible']==false) {
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
                            <button type="submit" name="schval"
                                    value="schval<?php echo $nabidka['id_nabidka']?>" class="btn btn-sm btn-success">Schvalit</button>
                            <button type="submit" name="zamitni"
                                    value="zamitni<?php echo $nabidka['id_nabidka']?>" class="btn btn-sm btn-danger">Zamítnout</button>
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
            <?php }} ?>
        </tbody>
    </table>
</div>
<!-- KONEC: Tabulka s nabídkami -->

<br>
<!-- KONEC: Obsah stranky -->

<?php
$tplHeaders->createFooter();
?>
</body>
