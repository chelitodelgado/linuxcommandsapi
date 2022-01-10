(function ($) {
    'use strict';

    function tablaCategorys(){
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
                var tbody = '';
                for (let i = 0; i < data.length; i++) {
                    tbody +=  '\
                    <tr>\
                        <td>'+(i+1)+'</td>\
                        <td>'+data[i].name+'</td>\
                        <td>'+data[i].fecha+'</td>\
                        <td class="table-action">\
                            <a id="'+data[i].id+'" class="edit action-icon"> <i class="mdi mdi-pencil"></i></a>\
                            <a id="'+data[i].id+'" class="del action-icon"> <i class="mdi mdi-delete"></i></a>\
                        </td>\
                    </tr>';
                    $('#table_category').html(tbody);
                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error al encontrar datos', jqXHR);
            }
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
                    tablaCategorys();
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
                    tablaCategorys();
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
                    console.log(data);
                    $('#import_category')[0].reset();
                    tablaCategorys();
                },
				error: function(jqXHR, textStatus, errorThrown) {
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
                tablaCategorys();
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.log('Error al editar categoria.', jqXHR);
            }
        });
    });

    tablaCategorys();

})(jQuery);
