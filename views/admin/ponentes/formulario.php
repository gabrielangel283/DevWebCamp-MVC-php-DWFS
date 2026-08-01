<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion Personal</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre del Ponente: </label>
        <input
            type="text"
            class="formulario__input"
            placeholder="Ej. Pedro"
            id="nombre"
            name="nombre"
            value="<?php echo $ponente->nombre ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="apellido" class="formulario__label">Apellidos: </label>
        <input
            type="text"
            class="formulario__input"
            placeholder="Ej. PicaPiedra"
            id="apellido"
            name="apellido"
            value="<?php echo $ponente->apellido ?? '' ?>">
    </div>

    <div class="formulario__campo">
        <label for="ciudad" class="formulario__label">Ciudad: </label>
        <input
            type="text"
            class="formulario__input"
            placeholder="Lima"
            id="ciudad"
            name="ciudad"
            value="<?php echo $ponente->ciudad ?? '' ?>">
    </div>

    <div class="formulario__campo">
        <label for="pais" class="formulario__label">Pais: </label>
        <input
            type="text"
            class="formulario__input"
            placeholder="Pais del ponente"
            id="pais"
            name="pais"
            value="<?php echo $ponente->pais ?? '' ?>">
    </div>

    <div class="formulario__campo">
        <label for="imagen" class="formulario__label">Imagen del ponente: </label>
        <input
            type="file"
            class="formulario__input formulario__input--file"
            id="imagen"
            name="imagen">
    </div>
    <?php if (isset($ponente->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen Actual</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen; ?>.png" type="image/png">

                <img src="<?php echo $_ENV['HOST'] . '/img/speakers/' . $ponente->imagen; ?>.webp" alt="Imagen Ponente">
            </picture>
        </div>
    <?php } ?>
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion Extra</legend>

    <div class="formulario__campo">
        <label for="tags_input" class="formulario__label">Areas de experiencia(separadas por coma): </label>
        <input
            type="text"
            class="formulario__input"
            placeholder="Ej. Node.js, React, PHP, Java"
            id="tags_input"
            name="tags_input"
            value="">

        <div class="formulario__listado" id="tags"></div>
        <input type="hidden" name="tags" value="<?php echo $ponente->tags ?? ''; ?>">
    </div>
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Redes Sociales</legend>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-facebook"></i>
            </div>
            <input
                type="text"
                class="formulario__input--sociales"
                placeholder="Facebook"
                name="redes[facebook]"
                value="<?php echo $redes->facebook ?? '' ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-twitter"></i>
            </div>
            <input
                type="text"
                class="formulario__input--sociales"
                placeholder="Twitter"
                name="redes[twitter]"
                value="<?php echo $redes->twitter ?? '' ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-youtube"></i>
            </div>
            <input
                type="text"
                class="formulario__input--sociales"
                placeholder="Youtube"
                name="redes[youtube]"
                value="<?php echo $redes->youtube ?? '' ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-instagram"></i>
            </div>
            <input
                type="text"
                class="formulario__input--sociales"
                placeholder="Instagram"
                name="redes[instagram]"
                value="<?php echo $redes->instagram ?? '' ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-tiktok"></i>
            </div>
            <input
                type="text"
                class="formulario__input--sociales"
                placeholder="Tiktok"
                name="redes[tiktok]"
                value="<?php echo $redes->tiktok ?? '' ?>">
        </div>
    </div>

    <div class="formulario__campo">
        <div class="formulario__contenedor-icono">
            <div class="formulario__icono">
                <i class="fa-brands fa-github"></i>
            </div>
            <input
                type="text"
                class="formulario__input--sociales"
                placeholder="Github"
                name="redes[github]"
                value="<?php echo $redes->github ?? '' ?>">
        </div>
    </div>
</fieldset>