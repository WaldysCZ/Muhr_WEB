<?php
global $tplData;

require("ZakladHTML.class.php");
$tplHeaders = new ZakladHTML();

$tplHeaders->createHeader($tplData['title']);
?>

<body>
<?php
$tplHeaders->createNav($tplData['pravo']);
?>

<!-- Obsah Stránky -->
<div class="container jumbotron">
    <h1> Nabídky </h1>
    <p>Vyberte si z nabídky našich schválených a ověřených pomocníků podle lokace a druhů pomoci, rozklikněte si pro více informací o dané osobě a jeho hodnocení.</p>
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
            if ($nabidka['visible']==true) {
            ?>
        <tr class="position-relative">
            <td><?php echo $nabidka["id_uzivatel"]; ?></td>
            <td><?php echo $nabidka["lokace"]; ?></td>
            <td>
                TODO
            </td>
            <td class="text-center">
                <a class="btn btn-sm btn-outline-secondary" data-toggle="collapse"
                   data-target="#demo<?php echo $nabidka['id_nabidka']?>">Podrobnosti</a>
                <a href="#" class="btn btn-sm btn-secondary">Objednat</a>
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
