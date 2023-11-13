{% extends views/layout.tpl %}
{% block title %}Home Page{% endblock %}

{% block content %}

<div class="card">
    <div class="card-header">LOGIN</div>
    <div class="card-body">
        {% if ($message != '') { %}
        <p class="alert alert-warning">{{ $message }}</p>
        {% } %}
        <form action="authenticate.php" method="post">
            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="username" placeholder="Username" id="username" class="form-control" required>

            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input class="form-control mb-3" type="password" name="password" placeholder="Password" id="password" required>
            <input class="btn btn-primary" type="submit" value="Login">
        </form>
    </div>
</div>

{% endblock %}
