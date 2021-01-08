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
<div>
    <!-- Nový předmět -->

    <div class="container jumbotron">
        <!-- Registrace Uživatele-->
        <div class="">
            <form action="http://students.kiv.zcu.cz/~nyklm/+studenti-kiv-web/formular-zobrazeni.php" method="post"
                  target="_blank" accept-charset="UTF-8" enctype="multipart/form-data" >
                <fieldset class="form-group">
                    <h1>Nová nabídka</h1>
                    <br>

                    <label for="n_lokace">
                        Lokace<sup>*</sup>:
                        <input type="text" class="form-control" name="login" id="n_lokace" placeholder="Vaše lokace" autofocus required>
                    </label><br><br>

                    <div>
                        Poskytuji služby<sup>*</sup>:
                        <label class="form-check" for="n_nakupy">
                            <input type="checkbox" class="form-check-input" name="služby[]" value="nakupy" id="n_nakupy">
                            <span class="badge badge-pill badge-primary">Nákupy</span>
                        </label>
                        <label class="form-check" for="n_spolecnost">
                            <input type="checkbox" class="form-check-input" name="služby[]" value="spolecnost" id="n_spolecnost">
                            <span class="badge badge-pill badge-secondary">Společnost</span>
                        </label>
                        <label class="form-check" for="n_telefonaty">
                            <input type="checkbox" class="form-check-input" name="služby[]" value="telefonaty" id="n_telefonaty">
                            <span class="badge badge-pill badge-danger">Telefonáty</span>
                        </label>
                        <label class="form-check" for="n_dovoz">
                            <input type="checkbox" class="form-check-input" name="služby[]" value="dovoz" id="n_dovoz">
                            <span class="badge badge-pill badge-success">Dovoz</span>
                        </label>
                        <label class="form-check" for="n_doucovani">
                            <input type="checkbox" class="form-check-input" name="služby[]" value="doucovani" id="n_doucovani">
                            <span class="badge badge-pill badge-warning">Doučování</span>
                        </label>
                        <label class="form-check" for="n_pomoc">
                            <input type="checkbox" class="form-check-input" name="služby[]" value="pomoc" id="n_pomoc">
                            <span class="badge badge-pill badge-info">Obecná pomoc</span>
                        </label>
                    </div>
                    <br>

                    <label for="n_info">
                        Dodatečné informace<sup>*</sup>:<br>
                        <textarea class="form-control" name="info" rows="6" cols="100" id="n_info" placeholder="-- Popište sebe, svojí pomoc, zkušenosti, dostupné dny --"></textarea>
                    </label><br><br>

                    <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="agree" required> Souhlasím, že budu muset vykonat všechno, co jsem slíbil.
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Check this checkbox to continue.</div>
                        </label>
                    </div>

                    <div class="is-required">
                        * Musí být zadáno.
                    </div><br>

                    <input type="submit" class="btn btn-secondary" name="odeslano" value="Odeslat ke schválení">
                </fieldset>
            </form>
        </div>
    </div>

</div>
<!-- KONEC: Obsah Stránky -->

<?php
$tplHeaders->createFooter();
?>
</body>
