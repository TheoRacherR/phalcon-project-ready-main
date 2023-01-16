<h1>Liste des utilisateurs</h1>

<ul>
    <?php foreach ($accounts as $account) { ?>
        <li><?= $account->username ?></li>
    <?php } ?>
</ul>