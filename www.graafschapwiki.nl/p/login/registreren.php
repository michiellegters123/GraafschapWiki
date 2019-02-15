<?php
$PAGE_TITLE = "GraafschapWiki - Registreren";
$HEADER_ITEMS = array("<link rel=\"stylesheet\" href=\"../../res/css/login.css\">");
include "../../include/views/Header.php"
?>
<style>
    .ButtonLogin
    {
        margin-bottom: 10px;
        width: 204px;
        height: 35px;
        border-radius: 4px;
        border: 0;
    ;
        background-color: #3366cc;
        color: white;

    }
</style>


<div>

</div>
<div class="ContainerLogin">
    <div class="divContent">
        <h2>Aanmelden</h2>
        <form action="register.php" method="post">
            <p>Gebruikersnaam</p>
            <input type="text" name="username" placeholder="Gebruikersnaam">
            <p>Email *</p>
            <input type="email" name="email" placeholder="Email" required>
            <p>Wachtwoord *</p>
            <input type="password" name="password" placeholder="Wachtwoord" required><br><br>
            <input type="submit" value="Registreren" class="ButtonLogin" style="width: 204px">
        </form>
    </div>
</div>

<?php
include "../../include/views/Footer.php"
?>