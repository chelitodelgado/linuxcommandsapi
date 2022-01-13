(function ($) {
    'use strict';

    function tablaCommands() {
        $("#commandsTable").DataTable({
            processing: false,
            serverSide: false,
            language: {
                url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            ajax: {
                url: "api/commands",
                type: "POST",
                method: "POST",
                dataType: 'json',
                data: {
                    'id_user': 1,
                },
            },
            columns:[
                { data: "category"     },
                { data: "command"      },
                { data: "description"  },
                { data: "lang"  },
                { data: "fecha", "render": function (data) {
                        var date = new Date(data);
                        var month = date.getMonth() + 1;
                        return (month.length > 1 ? month : "0" + month) + "/" + date.getDate() + "/" + date.getFullYear();
                    }
                },
                { data: "id", render: function(data) {
                    return `
                        <div class="table-action">
                            <a id="${data}" class="edit action-icon"> <i class="mdi mdi-pencil"></i></a>
                            <a id="${data}" class="del action-icon"> <i class="mdi mdi-delete"></i></a>
                        </div>
                        `;
                    }
                },
            ]
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
                    $('#commandsTable').DataTable().ajax.reload();
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
                    $('#commandsTable').DataTable().ajax.reload();
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
                    Swal.fire({
                        icon: 'success',
                        title: 'Importacion exitosa.',
                        text: 'La informacion se alamaceno con exito',
                    });
                    $('#import_commands')[0].reset();
                    $('#commandsTable').DataTable().ajax.reload();
                    cifrasTotale();
                },
				error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al importar',
                        text: 'La informacion no fue alamacenada.',
                    });
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
                $('#commandsTable').DataTable().ajax.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error al eliminar comando.', jqXHR);
            }
        });
    });

    function llenarSelect() {
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

    function cifrasTotale() {
        const categoriasTotales = document.querySelector('#total_categorias');
        const comandosTotales   = document.querySelector('#total_comandos');
        // const listCategorias    = document.querySelector('#listCategorys');
        fetch('api/cifrasTorales')
            .then( resp => resp.json())
            .then( data => {
                const result  = data.data;
                const listTrue = data.data;
                categoriasTotales.innerHTML = result.categoriasTotales;
                comandosTotales.innerHTML = result.comandosTotales;
                // listCategorias.innerHTML = '';
                // listTrue.elementosCargados.forEach(item => {
                //     listCategorias.innerHTML += `
                //         <tr>
                //             <td>${item.name}</td>
                //         </tr>
                //     `;
                // });
            })
    }

    tablaCommands();
    llenarSelect();
    cifrasTotale();

})(jQuery);
