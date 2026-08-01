(function () {
    const horas = document.querySelector('#horas');

    if (horas) {
        const categoria = document.querySelector('[name="categoria_id"]');
        const dias = document.querySelectorAll('[name="dia"]');
        const inputHiddenDia = document.querySelector('[name="dia_id"]');
        const inputHiddenHora = document.querySelector('[name="hora_id"]');

        categoria.addEventListener('change', termineBusqueda);
        dias.forEach(dia => dia.addEventListener('change', termineBusqueda));

        let busqueda = {
            categoria_id: +categoria.value || '',
            dia: +inputHiddenDia.value || ''
        }

        if (!Object.values(busqueda).includes('')) {

            (async () => {
                await buscarEventos();

                const id = inputHiddenHora.value;

                // resaltar la hora actual
                const horaSelect = document.querySelector(`[data-hora-id="${id}"]`);

                horaSelect.classList.remove('horas__hora--deshabilitado');
                horaSelect.classList.add('horas__hora--seleccionada');

                horaSelect.onclick = seleccionarHora;
            })()
        }

        function termineBusqueda(e) {

            busqueda[e.target.name] = e.target.value;

            // reiniciar campos ocultos y la seleccion
            inputHiddenHora.value = "";
            inputHiddenDia.value = "";

            // deshabilitar la hora previa
            const horaPrevia = document.querySelector('.horas__hora--seleccionada');
            if (horaPrevia) {
                horaPrevia.classList.remove('horas__hora--seleccionada');
            }

            if (Object.values(busqueda).includes('')) {
                return;
            }

            buscarEventos();
        }

        async function buscarEventos() {
            const { dia, categoria_id } = busqueda;
            const URL = `/api/eventos-horario?dia_id=${dia}&categoria_id=${categoria_id}`;

            const resultado = await fetch(URL);
            const eventos = await resultado.json();

            obtenerHorasDisponibles(eventos);
        }

        function obtenerHorasDisponibles(eventos) {
            // reiniciar las horas
            const listadoHoras = document.querySelectorAll('#horas li');
            listadoHoras.forEach(li => li.classList.add('horas__hora--deshabilitado'));

            // comprobar eventos ya tomados
            const horasTomadas = eventos.map(evento => evento.hora_id);
            const listadoHorasArray = Array.from(listadoHoras);

            const resultado = listadoHorasArray.filter(li => !horasTomadas.includes(li.dataset.horaId));

            resultado.forEach(li => li.classList.remove('horas__hora--deshabilitado'));

            const horasDisponibles = document.querySelectorAll('#horas li:not(.horas__hora--deshabilitado)');
            horasDisponibles.forEach(hora => hora.addEventListener('click', seleccionarHora));
        }

        function seleccionarHora(e) {

            // deshabilitar la hora previa
            const horaPrevia = document.querySelector('.horas__hora--seleccionada');
            if (horaPrevia) {
                horaPrevia.classList.remove('horas__hora--seleccionada');
            }

            // agregar clase de seleccionado
            e.target.classList.add('horas__hora--seleccionada');
            inputHiddenHora.value = e.target.dataset.horaId;

            // llenar el campo oculto de dia
            inputHiddenDia.value = document.querySelector('[name="dia"]:checked').value;
        }
    }


})();