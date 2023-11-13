{% extends views/layout.tpl %}
{% block title %}Home Page{% endblock %}

{% block content %}

<div class="card">
    <div class="card-header">Seiten</div>
    <div class="card-body">
        <a href="page.php?fnc=new" class="btn btn-outline-primary">Neu</a>
        <table class="table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Interner Name</td>
                    <td>Aktion</td>
                </tr>
            </thead>
            <tbody>
                {% foreach($pages as $page): %}
                    <tr>
                        <td>{{ $page['id'] }}</td>
                        <td>{{ $page['internalName'] }}</td>
                        <td>
                            <a href="page.php?fnc=edit&id={{ $page['id'] }}" class="btn btn-primary">Bearbeiten</a>
                            <a href="page.php?fnc=delete&id={{ $page['id'] }}" class="btn btn-danger">Löschen</a>
                        </td>
                    </tr>

                {% endforeach; %}
                <tr>

                </tr>
            </tbody>

        </table>
    </div>
</div>

{% endblock %}
