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
            <form action="Login.php" method="post">
                <p>Email</p>
                <input type="email" name="email" placeholder="Email">
                <p>Wachtwoord</p>
                <input type="password" name="password" placeholder="Wachtwoord"><br>
                <input type="submit" value="Aanmelden" class="ButtonLogin">
            </form>
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="A_FormText">Wachtwoord vergeten</a>
        </div>
    </div>

    <?php
    include "../../include/views/Footer.php"
    ?>

