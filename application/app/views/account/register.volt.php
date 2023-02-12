<form action="/account/create" method="post">
    <div class="mb-3">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" id="username">
    </div>
    <div class="mb-3">
        <label for="email">Mail</label>
        <input type="text" class="form-control" name="email" id="email">
    </div>
    <div class="mb-3">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enregistrer le compte</button>
    </div>
</form>

<div class="mb-3">
    <a class="nav-link" href="/account/login">Vous avez déjà un compte ? Connectez vous<a>
</div>