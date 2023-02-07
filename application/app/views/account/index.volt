<h1>Account/index</h1>

{% if session.get('auth') %}
    <a href="/account/logout" class="btn btn-warning">Se déconnecter</a>
{% endif %}