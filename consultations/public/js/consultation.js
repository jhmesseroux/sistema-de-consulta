
function mostrarSegunTipoDeConsulta()
{
    var tipoConsultaSeleccionada = document.getElementById('type');
    tipoConsultaSeleccionada = tipoConsultaSeleccionada.value;

    switch(tipoConsultaSeleccionada)
    {
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
