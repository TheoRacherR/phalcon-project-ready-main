<h1>Liste des utilisateurs</h1>

<ul>
    {% for account in accounts %}
        <li>{{ account.username }}</li>
    {% endfor %}
</ul>