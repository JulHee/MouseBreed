
<p class="top_head">Einstellungen</p>

<div class="h_menu">
    <a class="<?php echo ($subpage == "general") ? "h_menu_selected" : ""; ?>" href="/settings/general">
        Allgemein
    </a>
    <a class="<?php echo ($subpage == "email") ? "h_menu_selected" : ""; ?>"  href="/settings/email">
        E-Mail-Adresse
    </a>
    <a class="<?php echo ($subpage == "password") ? "h_menu_selected" : ""; ?>"  href="/settings/password">
        Passwort
    </a>
    <a class="<?php echo ($subpage == "delete") ? "h_menu_selected" : ""; ?>"  href="/settings/delete">
        Konto löschen
    </a>
</div>

<div class="setting_subpage">
    <?php include "settings/$subpage.php"; ?>
</div>
