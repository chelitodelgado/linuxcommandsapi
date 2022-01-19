(function ($) {
    'use strict';

    function tablaCategorys(){
        $("#categoryTable").DataTable({
            processing: false,
            serverSide: false,
            language: {
                url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            ajax: {
                url: "api/categorys",
                type: "POST",
                method: "POST",
                dataType: 'json',
                data: {
                    'id_user': 1,
                },
            },
            columns:[
                { data: "ico", render: function(data) {
                    return `<img src="${data}" width="32">`;
                }},
                { data: "name"  },
                { data: "lang"  },
                { data: "fecha",
                "render": function (data) {
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

    $('#form_category').on('submit', function(event){
        event.preventDefault();

        if($('#guardar').val() == 'Guardar') {
            $.ajax({
                url: 'api/categoryAdd',
                method:"POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success:function(data){
                    $('#form_category')[0].reset();
                    $('#categoryTable').DataTable().ajax.reload();
                },
				error: function(jqXHR, textStatus, errorThrown) {
				  console.log('Error agregar categoria', jqXHR);
				}
            });
        }
        if($('#guardar').val() == 'Actualizar') {
            $.ajax({
                url: 'api/categoryUpdate',
                method:"POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success:function(data){
					$('#form_category')[0].reset();
                    $('#guardar').removeClass("btn-info");
                    $('#guardar').addClass("btn-primary");
                    $('#guardar').val('Guardar');
                    $('#categoryTable').DataTable().ajax.reload();
                },
				error: function(jqXHR, textStatus, errorThrown) {
				  console.log('Error actualizar categoria', jqXHR);
				}
            });
        }

    });

    $('#import_category').on('submit', function(event) {
        event.preventDefault();

        if($('#importar').val() == 'Importar') {
            $.ajax({
                url: 'api/categoryImport',
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
                    $('#import_category')[0].reset();
                    $('#categoryTable').DataTable().ajax.reload();
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

    $('#import_image_category').on('submit', function(event) {
        event.preventDefault();

        if($('#agregar').val() == 'Agregar') {
            $.ajax({
                url: 'api/imagenImport',
                method:"POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success:function(data){
                    Swal.fire({
                        icon: 'success',
                        title: 'Se agrego imagen con exito.',
                        text: 'La imagen se alamaceno con exito',
                    });
                    $('#import_image_category')[0].reset();
                    $('#categoryTable').DataTable().ajax.reload();
                },
				error: function(jqXHR, textStatus, errorThrown) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al importar',
                        text: 'La informacion no fue alamacenada.',
                      });
				  console.log('Error al importar icono de categorias', jqXHR);
				}
            });
        }
    });

    $(document).on('click', '.edit', function(){
        var categoria_id = $(this).attr('id');
        $.ajax({
            url: 'api/categoryEdit',
            method:"POST",
            type: "POST",
			dataType: 'json',
            data: { 'id': categoria_id},
            success:function(data) {
                $('#name').val(data.data[0].name);
                $('#id_category').val(data.data[0].id);
                $('#guardar').addClass("btn-info");
                $('#guardar').val('Actualizar');
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.log('Error al editar categoria.', jqXHR);
            }
        });
    });

    $(document).on('click', '.del', function(){
        var categoria_id;
        categoria_id = $(this).attr('id');
        $.ajax({
            url: 'api/categoryDestroy',
            method:"POST",
            type: "POST",
			dataType: 'json',
            data: { 'id': categoria_id},
            success:function(data) {
                $('#categoryTable').DataTable().ajax.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.log('Error al editar categoria.', jqXHR);
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
                    $('#id_categorys').html(option);
                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error al encontrar datos', jqXHR);
            }
        });
    }

    tablaCategorys();
    llenarSelect()
})(jQuery);
