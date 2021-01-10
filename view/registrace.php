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

<body>
<!-- Obsah Stránky -->


<div>
    <?php
    if(isset($_POST['prihlasit'])){

        if($tplData['povedloSe']){
          header("Location:index.php");
            ?>

            <?php
        } else {
            ?>
            <div class="container alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Chyba</strong> Zadali jste špatné jméno nebo heslo
            </div>
            <?php
        }
    }
    ?>
    <?php
    if(isset($_POST['registruj'])){

        if($tplData['povedloSe']){
            ?>
            <div class="container alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Povedlo se!</strong> Byl jste zaregistrován, můžete se přihlásit
            </div>
            <?php
        } else {
            ?>
            <div class="container alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Nepovedlo se!</strong> Uživatel už existuje
            </div>
            <?php
        }
    }
    ?>
    <?php
    if(isset($_POST['registrujP'])){

        if($tplData['povedloSe']){
            ?>
            <div class="container alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Povedlo se!</strong> Byl jste zaregistrován, můžete se přihlásit
            </div>
            <?php
        } else {
            ?>
            <div class="container alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Nepovedlo se!</strong> Uživatel už existuje
            </div>
            <?php
        }
    }
    ?>
    <!-- Přihlášení -->
    <form class="form-signin text-center d-flex" method="post">
        <!-- Osobni udaje uzivatele -->
        <fieldset class="container jumbotron form-group">
            <h1>Přihlášení</h1>
            <br>
            <label for="lb_login">
                Uživatelské jméno:
                <input type="text" class="form-control" name="loginI" id="lb_login" placeholder="login" autofocus required>
            </label><br>

            <label for="lb_heslo">
                Heslo:
                <input type="password" class="form-control" name="hesloI" id="lb_heslo" placeholder="heslo" required>
            </label><br>

            <input type="submit" class="btn btn-secondary" name="prihlasit" value="Přihlásit">
        </fieldset>
    </form>
    <!-- KONEC: Přihlášení -->

    <!-- Registrace -->
    <div class="container jumbotron">
        <div class="row">
            <!-- Registrace Uživatele-->
            <div class="col-sm-6 col-md-5 col-lg">
                <form class="form-signin d-flex" method="post">
                    <fieldset class="form-group">
                        <h1>Registrace</h1>
                        <p>Přidejte se a řekněte si o pomoc</p>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Jméno</span>
                            </div>
                            <input type="text" class="form-control" name="jmeno" id="rg_jmeno" placeholder="jméno">
                            <input type="text" class="form-control" name="prijmeni" id="rg_prijmeni" placeholder="prijmeni">
                        </div>

                        <label for="rg_login">
                            Uživatelské jméno<sup>*</sup>:
                            <input type="text" class="form-control" name="login" id="rg_login" placeholder="login" autofocus required>
                        </label><br>

                        <label for="rg_mail">
                            E-mail<sup>*</sup>:
                            <input type="email" class="form-control" name="email" id="rg_mail" placeholder="email@mail.com" required>
                        </label><br>

                        <label for="rg_tel">
                            Telefonní Číslo:
                            <input type="tel" class="form-control" name="telefon" id="rg_tel" placeholder="+420 000 000 000">
                        </label><br>

                        <label for="rg_heslo">
                            Heslo<sup>*</sup>:
                            <input type="password" class="form-control" name="heslo" id="rg_heslo" placeholder="heslo" required>
                        </label><br>

                        <div class="form-group form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="agree" required> Souhlasím, že nebudu zneužívat služby tohoto webu.
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Check this checkbox to continue.</div>
                            </label>
                        </div>

                        <div class="is-required">
                            * Musí být zadáno.
                        </div><br>

                        <button type="submit" class="btn btn-secondary" name="registruj" value="registruj">Registruj</button>
                    </fieldset>
                </form>
            </div>
            <!-- Registrace Pomocníka-->
            <div class="col-sm-6 col-md-5 col-lg">
                <form class="form-signin d-flex" method="post">
                    <fieldset class="form-group">
                        <h1>Registrace Pomocníka</h1>
                        <p>Staňte se i vy další pomocnou silou!</p>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Jméno<sup>*</sup></span>
                            </div>
                            <input type="text" class="form-control" name="jmenoP" id="p_jmeno" placeholder="jméno" required>
                            <input type="text" class="form-control" name="prijmeniP" id="p_prijmeni" placeholder="prijmeni" required>
                        </div>

                        <label for="p_login">
                            Uživatelské jméno<sup>*</sup>:
                            <input type="text" class="form-control" name="loginP" id="p_login" placeholder="login" autofocus required>
                        </label><br>

                        <label for="p_mail">
                            E-mail<sup>*</sup>:
                            <input type="email" class="form-control" name="emailP" id="p_mail" placeholder="email@mail.com" required>
                        </label><br>

                        <label for="p_tel">
                            Telefonní Číslo<sup>*</sup>:
                            <input type="tel" class="form-control" name="telefonP" id="p_tel" placeholder="+420 000 000 000" required>
                        </label><br>

                        <label for="p_heslo">
                            Heslo<sup>*</sup>:
                            <input type="password" class="form-control" name="hesloP" id="p_heslo" placeholder="heslo" required>
                        </label><br>

                        <div class="form-group form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="agree_1" required> Souhlasím, že nebudu zneužívat služby tohoto webu.
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Check this checkbox to continue.</div>
                            </label>
                        </div>
                        <div class="form-group form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="agree_2" required> Přísahám, že budu funkci pomocníka vyplňovat se vší mojí ctí a nesu veškerou zodpovědnost za své činy.
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Check this checkbox to continue.</div>
                            </label>
                        </div>

                        <div class="is-required">
                            * Musí být zadáno.
                        </div><br>

                        <button type="submit" class="btn btn-secondary" name="registrujP" value="registrujP">Registruj</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- KONEC: Obsah Stránky -->

<?php
$tplHeaders->createFooter();
?>
</body>