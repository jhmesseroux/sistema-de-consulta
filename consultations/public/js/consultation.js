function mostrarSegunTipoDeConsulta() {
    var tipoConsultaSeleccionada = document.getElementById('type');
    tipoConsultaSeleccionada = tipoConsultaSeleccionada.value;

    switch (tipoConsultaSeleccionada) {
        case 'Presencial':
            document.getElementById('div_place').style.display = 'block';
            document.getElementById('div_link').style.display = 'none';
            break;
        case 'Virtual':
            document.getElementById('div_place').style.display = 'none';
            document.getElementById('div_link').style.display = 'block';
            break;

    }

}

function darDeBajaConsulta(estabaActivada) {

    const reasonCancel_element = document.getElementById('reasonCancel');
    const alternative_element = document.getElementById('alternative');


    switch (document.getElementById('active_visible').value) {
        case 'Activada': // ESTADO POSTER: DESACTIVADA

            document.getElementById('active_visible').value = 'Desactivada';
            document.getElementById('active').value = 0;
            if (estabaActivada) {
                console.log('estaba desactivada y quiere desactivar');
                document.getElementById('div_reasonCancel').style.display = 'block';
                document.getElementById('div_alternative').style.display = 'block';

                document.getElementById('darDeBajaButton').textContent = 'X';
                document.getElementById('darDeBajaButton').title = 'Activar nuevamente';
                reasonCancel_element.required = true;
                alternative_element.required = true;

                // console.log(reasonCancel_element);
            }
            else
            {
                document.getElementById('darDeBajaButton').textContent = 'DAR DE ALTA';
                document.getElementById('darDeBajaButton').title = 'Dar de alta a la consulta'
            }

            break;

        case 'Desactivada': // ESTADO POSTERIOR: ACTIVADA
            document.getElementById('active_visible').value = 'Activada';
            document.getElementById('active').value = 1;
            if (estabaActivada) {
                console.log('estaba activada y quiere activar');

                document.getElementById('div_reasonCancel').style.display = 'none';
                document.getElementById('div_alternative').style.display = 'none';
                document.getElementById('darDeBajaButton').textContent = 'DAR DE BAJA';
                document.getElementById('darDeBajaButton').title = 'Dar de baja a la consulta'
                reasonCancel_element.required = false;
                alternative_element.required = false;
            }
            else
            {
                document.getElementById('darDeBajaButton').textContent = 'X';
                document.getElementById('darDeBajaButton').title = 'Desactivar nuevamente';
            }


            break;

    }
}


function activateValidation(estabaActivada) {
    if (estabaActivada) {
        const estado = document.getElementById('active').value;
        const reasonCancel_element = document.getElementById('reasonCancel');
        const alternative_element = document.getElementById('alternative');

        if (estado == 0) {
            reasonCancel = trim(reasonCancel_element.value);
            alternative = trim(alternative_element.value);

            if (reasonCancel.length < 10) {
                reasonCancel_element.setCustomValidity("Este campo no puede estar vacío o tener menos de 10 palabras");

            }

            if (alternative.length < 10) {
                alternative_element.setCustomValidity("Este campo no puede estar vacío o tener menos de 10 palabras");
            }
        }

    }
}
