<div class="auth">
    <h2 class="auth__heading"><?php echo $titulo ?></h2>
    <p class="auth__texto">Inicia Sesion en DevWebCamp</p>

    <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <form action="/login" class="formulario" method="POST">
        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email: </label>
            <input
                type="email"
                placeholder="Tu email"
                class="formulario__input"
                id="email"
                name="email" />
        </div>

        <div class="formulario__campo">
            <label for="password" class="formulario__password">Password: </label>
            <input
                type="password"
                placeholder="Tu password"
                class="formulario__input"
                id="password"
                name="password" />
        </div>

        <input type="submit" class="formulario__submit" value="Iniciar Sesion">
    </form>

    <div class="acciones">
        <a href="/registro" class="acciones__enlace">¿Aun no tienes Cuenta?. Registrate</a>

        <a href="/olvide" class="acciones__enlace">Olvide mi password</a>
    </div>
</div>