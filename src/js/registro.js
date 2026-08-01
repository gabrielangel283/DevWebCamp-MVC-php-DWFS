import Swal from 'sweetalert2'

(function () {
    let eventos = [];
    const resumen = document.querySelector('#registro-resumen');

    if (resumen) {

        const eventosBotton = document.querySelectorAll('.evento__agregar');
        eventosBotton.forEach(boton => boton.addEventListener('click', seleccionarEvento));

        const formularioRegistro = document.querySelector('#registro');
        formularioRegistro.addEventListener('submit', submitFormulario);

        mostrarEventos();

        function seleccionarEvento(e) {

            if (eventos.length < 5) {

                // deshabilitar el nuevo evento
                e.target.disabled = true;
                eventos = [...eventos, {
                    id: e.target.dataset.id,
                    titulo: e.target.parentElement.querySelector('.evento__nombre').textContent.trim()
                }];

                mostrarEventos();
            } else {
                Swal.fire({
                    title: "<strong>Limite de eventos</strong>",
                    icon: "info",
                    html: `
                            Solo se permiten <spam>5</spam> eventos en tu paquete
                        `,
                    showCloseButton: true,
                    focusConfirm: false,
                    confirmButtonText: "OK",
                });
            }

        }

        function mostrarEventos() {

            // limpiar el HTML
            limpiarEventos();

            if (eventos.length > 0) {
                eventos.forEach(evento => {
                    const eventoDOM = document.createElement('div');
                    eventoDOM.classList.add('registro__evento');

                    const titulo = document.createElement('h3');
                    titulo.classList.add('registro__nombre');
                    titulo.textContent = evento.titulo;

                    const botonEliminar = document.createElement('button');
                    botonEliminar.classList.add('registro__eliminar');
                    botonEliminar.innerHTML = '<i class="fa-solid fa-trash"></i>';
                    botonEliminar.onclick = function () {
                        eliminarEvento(evento.id);
                    }

                    // rederizar en el HTML
                    eventoDOM.appendChild(titulo);
                    eventoDOM.appendChild(botonEliminar);
                    resumen.appendChild(eventoDOM);
                });
            } else {
                const noRegistro = document.createElement('p');
                noRegistro.textContent = 'No hay eventos, añade hasta 5 del lado izquierdo';
                noRegistro.classList.add('registro__texto');
                resumen.appendChild(noRegistro);
            }
        }

        function limpiarEventos() {
            while (resumen.firstChild) {
                resumen.removeChild(resumen.firstChild);
            }
        }

        function eliminarEvento(id) {
            eventos = eventos.filter(evento => evento.id !== id);
            const botonAgregar = document.querySelector(`[data-id="${id}"]`);
            botonAgregar.disabled = false;
            mostrarEventos();
        }

        async function submitFormulario(e) {
            e.preventDefault();

            // obtener el regalo
            const regaloId = document.querySelector('#regalo').value;

            const eventosId = eventos.map(evento => evento.id);

            if (eventosId.length === 0 || regaloId === '') {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Debes elegir un regalo y almenos un evento",
                });
                return;
            }

            // objeto FormData
            const datos = new FormData();
            datos.append('eventos', eventosId);
            datos.append('regalo_id', regaloId);

            const URL = '/finalizar-registro/conferencias';
            const respuesta = await fetch(URL, {
                method: 'POST',
                body: datos
            })
            const resultado = await respuesta.json();

            if (resultado.resultado) {
                Swal.fire({
                    title: "Registro exitoso!",
                    icon: "success",
                    text: 'Tu conferencias se han almacenado y tu registro fue exitoso, te esperamos en DevWebCamp',
                    draggable: true
                }).then(() => location.href = `/boleto?id=${resultado.token}`);
            } else {
                Swal.fire({
                    icon: "error",
                    title: "ERROR",
                    text: 'Hubo un error',
                    confirmButtonText: 'OK'
                }).then(() => location.reload());
            }

        }
    }
})();