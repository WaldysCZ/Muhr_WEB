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
        <tr class="position-relative">
            <td>Dan Defoe</td>
            <td>Plzeň</td>
            <td>
                <span class="badge badge-pill badge-primary">Nákupy</span>
                <span class="badge badge-pill badge-secondary">Společnost</span>
                <span class="badge badge-pill badge-danger">Telefonáty</span>
                <span class="badge badge-pill badge-success">Dovoz</span>
                <span class="badge badge-pill badge-warning">Doučování</span>
                <span class="badge badge-pill badge-info">Obecná pomoc</span>
            </td>
            <td class="text-center">
                <a class="btn btn-sm btn-outline-secondary" data-toggle="collapse" data-target="#demo1">Podrobnosti</a>
                <a href="#" class="btn btn-sm btn-secondary">Objednat</a>
            </td>
        </tr>
        <tr>
            <div id="demo1" class="collapse text-justify text-light bg-dark rounded position-relative">
                Jmenuji se Dan Dafoe a jsem studentem zdravotní vysoké školy v Plzni.<br>
                Nabízím pomoc ve všech možných ohledech. Po objednání mé pomoci se domluvíme telefonicky na detailech. Pracuji jsem dostupný každý den od 8:00 do 17:00 kromě úterý.
                <br>Bude mi ctí vám být nápomocný.<br>
                <div>
                    Hodnocení:
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star-half-full"></span>
                </div>
                <br>
            </div>
        </tr>

        <tr class="position-relative">
            <td>Jan Donec</td>
            <td>Plzeň</td>
            <td>
                <span class="badge badge-pill badge-secondary">Společnost</span>
                <span class="badge badge-pill badge-danger">Telefonáty</span>
            </td>
            <td class="text-center">
                <a class="btn btn-sm btn-outline-secondary" data-toggle="collapse" data-target="#demo2">Podrobnosti</a>
                <a href="#" class="btn btn-sm btn-secondary">Objednat</a>
            </td>
        </tr>
        <tr>
            <div id="demo2" class="collapse text-justify text-light bg-dark rounded position-relative">
                Donec eleifend turpis vel diam ultricies placerat. Duis dapibus cursus diam. Sed ut nisi a ligula ultricies iaculis. Fusce aliquam rhoncus tincidunt. Nullam augue lorem, rhoncus a turpis vitae, ultrices ultricies tellus. Ut id feugiat lorem. Suspendisse at magna accumsan, ullamcorper tortor et, iaculis lectus. Aenean vel sem neque.
                <div>
                    Hodnocení:
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star-half-full"></span>
                    <span class="fa fa-star-o"></span>
                    <span class="fa fa-star-o"></span>
                </div>
                <br>
            </div>
        </tr>

        <tr class="position-relative">
            <td>Lada Nová</td>
            <td>Praha</td>
            <td>
                <span class="badge badge-pill badge-danger">Telefonáty</span>
                <span class="badge badge-pill badge-warning">Doučování</span>
            </td>
            <td class="text-center">
                <a class="btn btn-sm btn-outline-secondary" data-toggle="collapse" data-target="#demo4">Podrobnosti</a>
                <a href="#" class="btn btn-sm btn-secondary">Objednat</a>
            </td>
        </tr>
        <tr>
            <div id="demo4" class="collapse text-justify text-light bg-dark rounded position-relative">
                Praesent orci velit, efficitur ut elit sit amet, vestibulum mollis mi. In in diam tincidunt, molestie velit sit amet, posuere lorem. Maecenas sit amet urna eu enim suscipit ultrices vel vitae odio.
                <div>
                    Hodnocení:
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star-o"></span>
                    <span class="fa fa-star-o"></span>
                    <span class="fa fa-star-o"></span>
                    <span class="fa fa-star-o"></span>
                </div>
                <br>
            </div>
        </tr>

        <tr class="position-relative">
            <td>Petr Novotný</td>
            <td>Praha</td>
            <td>
                <span class="badge badge-pill badge-primary">Nákupy</span>
                <span class="badge badge-pill badge-success">Dovoz</span>
                <span class="badge badge-pill badge-info">Obecná pomoc</span>
            </td>
            <td class="text-center">
                <a class="btn btn-sm btn-outline-secondary" data-toggle="collapse" data-target="#demo5">Podrobnosti</a>
                <a href="#" class="btn btn-sm btn-secondary">Objednat</a>
            </td>
        </tr>
        <tr>
            <div id="demo5" class="collapse text-justify text-light bg-dark rounded position-relative">
                Praesent orci velit, efficitur ut elit sit amet, vestibulum mollis mi. In in diam tincidunt, molestie velit sit amet, posuere lorem. Maecenas sit amet urna eu enim suscipit ultrices vel vitae odio.
                <div>
                    Hodnocení:
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star-o"></span>
                    <span class="fa fa-star-o"></span>
                </div>
                <br>
            </div>
        </tr>

        <tr class="position-relative">
            <td>Ladislav Dubový</td>
            <td>Cheb</td>
            <td>
                <span class="badge badge-pill badge-secondary">Společnost</span>
                <span class="badge badge-pill badge-danger">Telefonáty</span>
                <span class="badge badge-pill badge-info">Obecná pomoc</span>
            </td>
            <td class="text-center">
                <a class="btn btn-sm btn-outline-secondary" data-toggle="collapse" data-target="#demo6">Podrobnosti</a>
                <a href="#" class="btn btn-sm btn-secondary">Objednat</a>
            </td>
        </tr>
        <tr>
            <div id="demo6" class="collapse text-justify text-light bg-dark rounded position-relative">
                Praesent orci velit, efficitur ut elit sit amet, vestibulum mollis mi. In in diam tincidunt, molestie velit sit amet, posuere lorem. Maecenas sit amet urna eu enim suscipit ultrices vel vitae odio.
                <div>
                    Hodnocení:
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star-o"></span>
                </div>
                <br>
            </div>
        </tr>

        <tr class="position-relative">
            <td>Bohunín Agreš</td>
            <td>Praha</td>
            <td>
                <span class="badge badge-pill badge-danger">Telefonáty</span>
                <span class="badge badge-pill badge-success">Dovoz</span>
            </td>
            <td class="text-center">
                <a class="btn btn-sm btn-outline-secondary" data-toggle="collapse" data-target="#demo7">Podrobnosti</a>
                <a href="#" class="btn btn-sm btn-secondary">Objednat</a>
            </td>
        </tr>
        <tr>
            <div id="demo7" class="collapse text-justify text-light bg-dark rounded position-relative">
                Praesent orci velit, efficitur ut elit sit amet, vestibulum mollis mi. In in diam tincidunt, molestie velit sit amet, posuere lorem. Maecenas sit amet urna eu enim suscipit ultrices vel vitae odio.
                <div>
                    Hodnocení:
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star-o"></span>
                    <span class="fa fa-star-o"></span>
                    <span class="fa fa-star-o"></span>
                </div>
                <br>
            </div>
        </tr>

        <tr class="position-relative">
            <td>Karolína Bledá</td>
            <td>Plzeň</td>
            <td>
                <span class="badge badge-pill badge-primary">Nákupy</span>
                <span class="badge badge-pill badge-secondary">Společnost</span>
                <span class="badge badge-pill badge-warning">Doučování</span>
                <span class="badge badge-pill badge-info">Obecná pomoc</span>
            </td>
            <td class="text-center">
                <a class="btn btn-sm btn-outline-secondary" data-toggle="collapse" data-target="#demo8">Podrobnosti</a>
                <a href="#" class="btn btn-sm btn-secondary">Objednat</a>
            </td>
        </tr>
        <tr>
            <div id="demo8" class="collapse text-justify text-light bg-dark rounded position-relative">
                Praesent orci velit, efficitur ut elit sit amet, vestibulum mollis mi. In in diam tincidunt, molestie velit sit amet, posuere lorem. Maecenas sit amet urna eu enim suscipit ultrices vel vitae odio.
                <div>
                    Hodnocení:
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star-o"></span>
                    <span class="fa fa-star-o"></span>
                </div>
                <br>
            </div>
        </tr>

        <tr class="position-relative">
            <td>Roman Pole</td>
            <td>Olomouc</td>
            <td>
                <span class="badge badge-pill badge-primary">Nákupy</span>
                <span class="badge badge-pill badge-secondary">Společnost</span>
                <span class="badge badge-pill badge-danger">Telefonáty</span>
                <span class="badge badge-pill badge-success">Dovoz</span>
                <span class="badge badge-pill badge-info">Obecná pomoc</span>
            </td>
            <td class="text-center">
                <a class="btn btn-sm btn-outline-secondary" data-toggle="collapse" data-target="#demo9">Podrobnosti</a>
                <a href="#" class="btn btn-sm btn-secondary">Objednat</a>
            </td>
        </tr>
        <tr>
            <div id="demo9" class="collapse text-justify text-light bg-dark rounded position-relative">
                Praesent orci velit, efficitur ut elit sit amet, vestibulum mollis mi. In in diam tincidunt, molestie velit sit amet, posuere lorem. Maecenas sit amet urna eu enim suscipit ultrices vel vitae odio.
                <div>
                    Hodnocení:
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star-o"></span>
                </div>
                <br>
            </div>
        </tr>

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
