<h1>Account/index</h1>

<?php if ($this->session->get('auth')) { ?>
    <a href="/account/logout" class="btn btn-warning">Se déconnecter</a>
<?php } ?>