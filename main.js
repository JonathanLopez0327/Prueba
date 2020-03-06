$(function() {
    console.log('Jquery esta en funcion');
    $('#alumnos-result').hide();

    setInterval(fetchAlumnos, 1000);

    $('#buscar').keyup(function(e) {
        if ($('#buscar').val()) {
            let search = $('#buscar').val();

            $.ajax({
                url: 'alumnos-buscar.php',
                type: 'POST',
                data: { search },
                success: function(response) {

                    let alumnos = JSON.parse(response);
                    let template = '';
                    alumnos.forEach(alumnos => {
                        template += `<li>
                        ${alumnos.nombre}
                    </li>`
                    });

                    $('#container').html(template);
                    $('#alumnos-result').show();
                }
            });

        } else {
            $('#alumnos-result').hide();
        }
    });

    $('#alumno-form').submit(function(e) {
        const posData = {
            name: $('#name').val(),
            carrera: $('#carrera').val(),
            grupo: $('#grupo').val()
        }

        $.post('alumnos-add.php', posData, function(response) {
            fetchAlumnos();

            $('#alumno-form').trigger('reset');
        });

        e.preventDefault();
    });


    function fetchAlumnos() {
        $.ajax({
            url: 'alumnos-list.php',
            type: 'GET',
            success: function(response) {
                let alumnos = JSON.parse(response);
                let template = '';

                alumnos.forEach(alumno => {
                    template += `
                        <tr alumnoId="${alumno.id_alumno}">
                            <td>${alumno.id_alumno}</td>
                            <td>${alumno.nombre}</td>
                            <td>${alumno.carrera}</td>
                            <td>${alumno.grupo}</td>

                            <td>
                                <button class="alumno-delete btn btn-danger">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    `
                });


                $('#dataTable').html(template);

            }
        });
    }

    $(document).on('click', '.alumno-delete', function() {

        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('alumnoId');
        $.post('alumnos-delete.php', { id }, function(response) {
            fetchAlumnos();
        })
    });


});