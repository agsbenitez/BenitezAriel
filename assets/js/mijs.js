
$(document).ready(function(){
    var usuariosTable = $('#usuarios_data').bootgrid({

        ajax:true,
        rowSelect: true,
        url: base_url + 'bootgrid/fetch_data',
        formatters:{
            "commands":function(column, row)
            {
                return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.id+"'>Edit</button>" + "&nbsp; <button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.id+"'>Delete</button>";
            }
        }
    });
    
    $('#add_button').click(function(){
        $('#usuarios_form')[0].reset();
        $('.modal-title').text("Add Usuario");
        $('#action').val("Add");
        $('#operation').val("Add");
    });

    $(document).on('submit', '#usuarios_form', function(event){
        event.preventDefault();
        var nombre = $('#nombre').val();
        var apellido = $('#apellido').val();
        var email = $('#email').val();
        var usuario = $('#usuario').val();
        var password = $('#password').val();
        var perfil = $('#perfil').val(); 
        var form_data = $(this).serialize();
        if(nombre != '' && apellido != '' &&  email != '' &&  usuario != '' &&  password != '' &&  perfil != '')
        {
            $.ajax({
                url:base_url + 'bootgrid/action',
                method:"POST",
                data:form_data,
                success:function(data)
                {
                    alert(data);
                    $('#usuarios_form')[0].reset();
                    $('#usuariosModal').modal('hide');
                    $('#usuarios_data').bootgrid('reload');
                }
            });
        }
        else
        {
            alert("All Fields are Required");
        }
    });

    $(document).on("loaded.rs.jquery.bootgrid", function(){
        usuariosTable.find('.update').on('click', function(event){
            var id = $(this).data('row-id');
            $.ajax({
                url:base_url + 'bootgrid/fetch_single_data',
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data)
                {
                    $('#usuariosModal').modal('show');
                    $('#nombre').val(data.nombre);
                    $('#apellido').val(data.apellido);
                    $('#email').val(data.email);
                    $('#usuario').val(data.usuario);
                    $('#password').val(data.password);
                    $('#perfil').val(data.perfil);
                    $('.modal-title').text("Editar Usuarios");
                    $('#usuario_id').val(id);
                    $('#action').val('Edit');
                    $('#operation').val('Edit');
                }
            });
        });
        
        
        usuariosTable.find('.delete').on('click', function(event){
            if(confirm("Are you sure you want to delete this?"))
            {
                var id = $(this).data('row-id');
                $.ajax({
                    url:base_url + 'bootgrid/delete_data',
                    method:"POST",
                    data:{id:id},
                    success:function(data)
                    {
                        alert(data);
                        $('#usuarios_data').bootgrid('reload');
                    }
                });
            }
            else
            {
                return false;
            }
        });
    });


    //Grid de Productos
    var productTable = $('#product_data').bootgrid({

        ajax:true,
        rowSelect: true,
        url: base_url + 'productos/fetch_data',
        formatters:{
            "image":function(column, row){
                return "<img class='table-img' src='" + base_url + "assets/img/productos/" + row.image + "'width='100' height='100'   />";

            },
            "commands":function(column, row)
            {
                return "<button type='button' class='btn btn-warning btn-xs update' data-row-id='"+row.id+"'>Edit</button>" + "&nbsp; <button type='button' class='btn btn-danger btn-xs delete' data-row-id='"+row.id+"'>Delete</button>";
            }

        }
    });
    
    $('#add_button').click(function(){
        $('#produc_form')[0].reset();
        $('.modal-title').text("Add Producto");
        $('#action').val("Add");
        $('#operation').val("Add");
    });


    $('#close').click(function(){
        $('#produc_form')[0].reset();
        $('#output').attr("src", '');
        $('.modal-title').text("Add Producto");
        $('#action').val("Add");
        $('#operation').val("Add");
    });

    //al apretar en el boton add del modal envia el form via ajax al controlador
    //el cual actua segun la accion a tomar, editando o agregando un producto
    $(document).on('submit', '#produc_form', function(event){
        event.preventDefault();
        var descripcion = $('#descripcion').val();
        var cat = $('#cat').val();
        var image = $('#output').attr("src");
        var price = $('#price').val();
        if(descripcion != '' && cat != '' &&   price != '' && image !='' )
        {
            $.ajax({
                url: base_url + 'productos/action',
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                //async:false,
                success: function(data){
                    alert("Greate!!!!");
                    $('#produc_form')[0].reset();
                    $('#productModal').modal('hide');
                    $('#produc_data').bootgrid('reload');
                    
                }
            });
                
        }else{
            alert("All Fields are Required");
        }
        
    });

    //Al hacer click en el boton edit busca el id en la base y carga los datos en el modal
    $(document).on("loaded.rs.jquery.bootgrid", function(){
        productTable.find('.update').on('click', function(event){
            var id = $(this).data('row-id');
            $.ajax({
                url:base_url + 'productos/fetch_single_data',
                method:"POST",
                data:{id:id},
                dataType:"json",
                success:function(data)
                {
                    $('#producModal').modal('show');
                    $('#descripcion').val(data.descripcion);
                    $('#cat').val(data.cat_id);
                    $('#price').val(data.price);
                    //se muestra la img en el modal
                    $('#output').attr("src", base_url + "assets/img/productos/" + data.image);
                    $('.modal-title').text("Editar Producto");
                    $('#id').val(id);
                    $('#action').val('Edit');
                    $('#operation').val('Edit');
                }
            });
        });
        
        
        productTable.find('.delete').on('click', function(event){
            if(confirm("Está Usted Seguro de Eliniar el producto?"))
            {
                var id = $(this).data('row-id');
                $.ajax({
                    url:base_url + 'bootgrid/delete_data',
                    method:"POST",
                    data:{id:id},
                    success:function(data)
                    {
                        alert(data);
                        $('#produc_data').bootgrid('reload');
                    }
                });
            }
            else
            {
                return false;
            }
        });
    });
    //fin grid productos

    //script para visualizar la imagen que se selecciona en el modal de productos
    const status = document.getElementById('status');
    const output = document.getElementById('output');
    
    if (window.FileList && window.File && window.FileReader) {
      document.getElementById('image').addEventListener('change', event => {
        output.src = '';
        status.textContent = '';
        const file = event.target.files[0];
        if (!file.type) {
          status.textContent = 'Error: The File.type property does not appear to be supported on this browser.';
          return;
        }
        if (!file.type.match('image.*')) {
          status.textContent = 'Error: The selected file does not appear to be an image.'
          return;
        }
        const reader = new FileReader();
        reader.addEventListener('load', event => {
          output.src = event.target.result;
        });
        reader.readAsDataURL(file);
        
      }); 
    }
    
});
