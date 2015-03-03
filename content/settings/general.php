
<div style="display: inline-block;">
    <table>
        <tr>
            <td>Benutzername:</td>
            <td><input id="username" name="username" type="text" class="input" value="<?php echo $_SESSION['userdata']['username']; ?>"></td>
        </tr>
        <tr>
            <td>Vorname:</td>
            <td><input id="firstname" name="firstname" type="text" class="input" value="<?php echo $_SESSION['userdata']['firstname']; ?>"></td>
        </tr>
        <tr>
            <td>Nachname:</td>
            <td><input id="lastname" name="lastname" type="text" class="input" value="<?php echo $_SESSION['userdata']['lastname']; ?>"></td>
        </tr>
    </table>

    <a id="save_button" class="button right hidden">Speichern</a>
</div>
