<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion Evento</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre del Evento: </label>
        <input
            type="text"
            class="formulario__input"
            placeholder="Ej. Como centrar un div sin morir en el intento en HTML"
            id="nombre"
            name="nombre"
            value="<?php echo $evento->nombre ?? ''; ?>">
    </div>

    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Descripcion: </label>
        <textarea
            class="formulario__input"
            placeholder="Descripcion de tu evento"
            id="descripcion"
            name="descripcion"
            rows="8"><?php echo $evento->descripcion ?? ''; ?></textarea>
    </div>

    <div class="formulario__campo">
        <label for="categoria" class="formulario__label">Categoria o Tipo de evento: </label>
        <select class="formulario__select" name="categoria_id" id="categoria">
            <option value="" disabled selected>- Seleccionar -</option>
            <?php foreach ($categorias as $categoria) { ?>
                <option <?php echo ($evento->categoria_id === $categoria->id) ? 'selected' : '' ?> value="<?php echo $categoria->id; ?>"><?php echo $categoria->nombre; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="formulario__campo">
        <label for="categoria" class="formulario__label">Seleccione el dia: </label>

        <div class="formulario__radio">
            <?php foreach ($dias as $dia) { ?>
                <div>
                    <label for="<?php echo strtolower($dia->nombre) ?>"><?php echo $dia->nombre ?></label>
                    <input
                        type="radio"
                        id="<?php echo strtolower($dia->nombre); ?>"
                        name="dia"
                        value="<?php echo $dia->id; ?>"
                        <?php echo ($evento->dia_id) === $dia->id ? 'checked' : ''; ?> />
                </div>
            <?php } ?>
        </div>
        <input type="hidden" name="dia_id" value="<?php echo $evento->dia_id; ?>">
    </div>

    <div class="formulario__campo" id="horas">
        <label for="formulario__label">Seleccionar Hora:</label>
        <ul class="horas" id="horas">
            <?php foreach ($horas as $hora) { ?>
                <li data-hora-id="<?php echo $hora->id; ?>" class="horas__hora horas__hora--deshabilitado"><?php echo $hora->hora; ?></li>
            <?php } ?>
        </ul>
        <input type="hidden" name="hora_id" value="<?php echo $evento->hora_id; ?>">
    </div>

</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion Extra</legend>

    <div class="formulario__campo">
        <label for="ponentes" class="formulario__label">Ponente</label>
        <input
            type="text"
            class="formulario__input"
            placeholder="Buscar Ponente"
            id="ponentes" />
        <ul class="listado-ponentes" id="listado-ponentes">

        </ul>

        <input type="hidden" name="ponente_id" value="<?php echo $evento->ponente_id; ?>">
    </div>

    <div class="formulario__campo">
        <label for="disponibles" class="formulario__label">Lugares Disponibles: </label>
        <input
            type="number"
            min="1"
            max="300"
            class="formulario__input"
            placeholder="Ej. 30"
            id="disponibles"
            name="disponibles"
            value="<?php echo $evento->disponibles; ?>" />
    </div>
</fieldset>