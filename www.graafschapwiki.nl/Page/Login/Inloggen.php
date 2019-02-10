    <?php
    $GLOBALS['title'] = "GraafschapWiki";
    $GLOBALS['resFolder'] = "../../res/";
    $GLOBALS['headerItems'] = array("<link rel=\"stylesheet\" href=\"../../res/css/login.css\">");
    include "../../include/views/Header.php"
    ?>

    <div>

    </div>
    <div class="ContainerLogin">
        <div class="divContent">
            <h2>Aanmelden</h2>
            <form>
                <p>Gebruikersnaam</p>
                <input type="text" placeholder="Gebruikersnaam">
                <p>Wachtwoord</p>
                <input type="text" placeholder="Wachtwoord"><br>
                <input type="submit" value="Aanmelden" class="ButtonLogin">
            </form>
            <a href="#" class="A_FormText">Wachtwoord vergeten</a>
        </div>
    </div>

    <?php
    include "../../include/views/Footer.php"
    ?>

