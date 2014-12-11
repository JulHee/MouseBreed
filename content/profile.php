<div class="left_list_container left noselect">
    <div class="left_list_head lager bold">
        Mein Konto
    </div>
    <div class="left_list">
        <a class="list_item <?php echo ($subpage == "general") ? "selected" : ""; ?>" href="/profile/general">
            Allgemein
        </a>
        <a class="list_item <?php echo ($subpage == "email") ? "selected" : ""; ?>"  href="/profile/email">
            E-Mail-Adresse
        </a>
        <a class="list_item <?php echo ($subpage == "password") ? "selected" : ""; ?>"  href="/profile/password">
            Passwort
        </a>
        <a class="list_item <?php echo ($subpage == "delete") ? "selected" : ""; ?>"  href="/profile/delete">
            Konto löschen
        </a>
    </div>
</div>
<div class="loadsavetest">
    <ul id="liste">
        <li>test</li>
    </ul>

</div>


<div class="selected_breed_container left">
    <?php include "profile/$subpage.php"; ?>
</div>
