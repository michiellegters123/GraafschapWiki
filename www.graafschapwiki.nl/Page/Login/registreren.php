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
        <form action="Register.php" method="post">
            <p>Gebruikersnaam</p>
            <input type="text" name="username" placeholder="Gebruikersnaam" required>
            <p>Email</p>
            <input type="email" name="email" placeholder="Email" required>
            <p>Wachtwoord</p>
            <input type="password" name="password" placeholder="Wachtwoord" required><br><br>
            <input type="submit" value="Registreren" style="width: 204px">
        </form>
    </div>
</div>

<?php
include "../../include/views/Footer.php"
?>