(function ($) {
    'use strict';

    const tablaCommands = () => {
        $.ajax({
            url: 'api/commands',
            type: "POST",
            method: "POST",
            dataType: 'json',
            data: {
                'id_user': 1,
            },
            success:function(response) {
                var data = response.data;
                var tbody = '';
                for (let i = 0; i < data.length; i++) {
                    tbody +=  '\
                    <tr>\
                        <td>'+(i+1)+'</td>\
                        <td>'+data[i].category+'</td>\
                        <td>'+data[i].command+'</td>\
                        <td>'+data[i].description+'</td>\
                        <td>'+data[i].fecha+'</td>\
                        <td class="table-action">\
                            <a id="'+data[i].id+'" class="edit action-icon"> <i class="mdi mdi-pencil"></i></a>\
                            <a id="'+data[i].id+'" class="del action-icon"> <i class="mdi mdi-delete"></i></a>\
                        </td>\
                    </tr>';
                    $('#table_command').html(tbody);
                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error al encontrar datos', jqXHR);
            }
        });
    };

    $('#form_command').on('submit', function(event){
        event.preventDefault();

        if($('#guardar').val() == 'Guardar') {
            $.ajax({
                url: 'api/commandAdd',
                method:"POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success:function(data){
                    $('#form_command')[0].reset();
                    tablaCommands();
                },
				error: function(jqXHR, textStatus, errorThrown) {
				  console.log('Error agregar comando', jqXHR);
				}
            });
        }
        if($('#guardar').val() == 'Actualizar') {
            $.ajax({
                url: 'api/commandUpdate',
                method:"POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success:function(data){
                    console.log(data);
					$('#form_command')[0].reset();
                    $('#guardar').removeClass("btn-info");
                    $('#guardar').addClass("btn-primary");
                    $('#guardar').val('Guardar');
                    tablaCommands();
                },
				error: function(jqXHR, textStatus, errorThrown) {
				  console.log('Error actualizar categoria', jqXHR);
				}
            });
        }

    });

    $('#import_commands').on('submit', function(event) {
        event.preventDefault();

        if($('#import').val() == 'Importar') {
            $.ajax({
                url: 'api/commandsImport',
                method:"POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success:function(data){
                    console.log(data);
                    $('#import_commands')[0].reset();
                    tablaCommands();
                    cifrasTotale();
                },
				error: function(jqXHR, textStatus, errorThrown) {
				  console.log('Error al importar categorias', jqXHR);
				}
            });
        }
    });

    $(document).on('click', '.edit', function(){
        var command_id = $(this).attr('id');
        console.log(command_id);
        $.ajax({
            url: 'api/commandEdit',
            method:"POST",
            type: "POST",
			dataType: 'json',
            data: { 'id': command_id},
            success:function(data) {
                console.log(data);
                $('#command').val(data.data[0].command);
                $('#category_id').val(data.data[0].category_id);
                $('#description').val(data.data[0].description);
                $('#comand_id').val(data.data[0].id);
                $('#guardar').addClass("btn-info");
                $('#guardar').val('Actualizar');
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.log('Error al editar comando.', jqXHR);
            }
        });
    });

    $(document).on('click', '.del', function(){
        var categoria_id;
        categoria_id = $(this).attr('id');
        $.ajax({
            url: 'api/commandDestroy',
            method:"POST",
            type: "POST",
			dataType: 'json',
            data: { 'id': categoria_id},
            success:function(data) {
                console.log(data);
                tablaCommands();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error al eliminar comando.', jqXHR);
            }
        });
    });

    const llenarSelect = () => {
        $.ajax({
            url: 'api/categorys',
            type: "POST",
            method: "POST",
            dataType: 'json',
            data: {
                'id_user': 1,
            },
            success:function(response) {
                var data = response.data;
                var option = '';
                option +=  '<option>Seleccionar...</option>';
                for (let i = 0; i < data.length; i++) {
                    option +=  '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    $('#category_id').html(option);
                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error al encontrar datos', jqXHR);
            }
        });
    }

    const cifrasTotale = () => {
        const categoriasTotales = document.querySelector('#total_categorias');
        const comandosTotales   = document.querySelector('#total_comandos');
        const listCategorias    = document.querySelector('#listCategorys');
        fetch('api/cifrasTorales')
            .then( resp => resp.json())
            .then( data => {
                const result  = data.data;
                const listTrue = data.data;
                categoriasTotales.innerHTML = result.categoriasTotales;
                comandosTotales.innerHTML = result.comandosTotales;
                listCategorias.innerHTML = '';
                listTrue.elementosCargados.forEach(item => {
                    listCategorias.innerHTML += `
                        <tr>
                            <td>${item.name}</td>
                        </tr>
                    `;
                });
            })
    }

    tablaCommands();
    llenarSelect();
    cifrasTotale();

})(jQuery);
