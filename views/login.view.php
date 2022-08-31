<!DOCTYPE html>
<html lang="en">
<?php
include_once __DIR__ . '/components/head.php'; ?>
<body>

<div class="main center">
    <header>
        <div>
            <a href="/register">register</a>
        </div>
        <div>
            <a href="/login">login</a>
        </div>
    </header>

    <form class="form register-form " method="post" action="/auth/login" id="login-form">
        <label for="email">Email</label>
        <input name="email" type="email" id="email"/>
        <label for="password">Password</label>
        <input name="password" type="password" id="password">
        <input name="submit" type="submit" value="login"/>
    </form>
</div>

<?php
include_once __DIR__ . '/components/footer.php'; ?>
</body>
</html>
