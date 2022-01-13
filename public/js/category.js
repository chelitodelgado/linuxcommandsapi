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

    tablaCategorys();
})(jQuery);
