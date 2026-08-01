(function () {
    const ponentesInput = document.querySelector('#ponentes');

    if (ponentesInput) {
        let ponentes = [];
        let ponentesFiltrados = [];

        const listadoPonentes = document.querySelector('#listado-ponentes');
        const ponenteHidden = document.querySelector('[name="ponente_id"]');

        obtenerPonentes();
        ponentesInput.addEventListener('input', buscarPonentes);

        if (ponenteHidden.value) {
            (async () => {
                const ponente = await obtenerPonente(ponenteHidden.value);
                const ponenteDOM = document.createElement('li');
                ponenteDOM.classList.add('listado-ponentes__ponente', 'listado-ponentes__ponente--seleccionado');
                ponenteDOM.textContent = `${ponente.nombre} ${ponente.apellido}`;
                listadoPonentes.appendChild(ponenteDOM);
            })()
        }

        async function obtenerPonentes() {
            const URL = `/api/ponentes`;
            const respuesta = await fetch(URL);
            const resultado = await respuesta.json();

            formatearPonentes(resultado);
        }

        async function obtenerPonente(id) {
            const URL = `/api/ponente?id=${id}`;
            const respuesta = await fetch(URL);
            const resultado = await respuesta.json();

            return resultado;
        }

        function formatearPonentes(arrayPonentes) {
            ponentes = arrayPonentes.map(ponente => {
                return {
                    nombre: `${ponente.nombre.trim()} ${ponente.apellido.trim()}`,
                    id: ponente.id
                }
            })
        }

        function buscarPonentes(e) {
            const busqueda = e.target.value;

            if (busqueda.length > 3) {
                // expresion regular para mayusculas y minusculas de la busqueda
                const expresion = new RegExp(busqueda, 'i');
                // filtrar los ponentes que coincidan con la busqueda del input
                ponentesFiltrados = ponentes.filter(ponente => {
                    if (ponente.nombre.toLowerCase().search(expresion) != -1) {
                        return ponente;
                    }
                })
            } else {
                ponentesFiltrados = [];
            }

            mostrarPonentes();

        }

        function mostrarPonentes() {
            while (listadoPonentes.firstChild) {
                listadoPonentes.removeChild(listadoPonentes.firstChild);
            }

            if (ponentesFiltrados.length > 0) {
                ponentesFiltrados.forEach(ponente => {
                    const ponenteHTML = document.createElement('li');
                    ponenteHTML.classList.add('listado-ponentes__ponente');
                    ponenteHTML.textContent = ponente.nombre;
                    ponenteHTML.dataset.ponenteId = ponente.id;
                    ponenteHTML.onclick = seleccionarPonente;

                    listadoPonentes.appendChild(ponenteHTML);
                })
            } else {
                const noResultado = document.createElement('p');
                noResultado.classList.add('listado-ponente__no-resultado');
                noResultado.textContent = 'No hay resultados para tu busqueda';
                listadoPonentes.appendChild(noResultado);
            }
        }

        function seleccionarPonente(e) {
            const ponente = e.target;

            // remover la clase previa
            const ponentePrevio = document.querySelector('.listado-ponentes__ponente--seleccionado');
            if (ponentePrevio) {
                ponentePrevio.classList.remove('listado-ponentes__ponente--seleccionado')
            }

            ponente.classList.add('listado-ponentes__ponente--seleccionado');

            ponenteHidden.value = ponente.dataset.ponenteId;
        }
    }
})();