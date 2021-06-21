$(document).ready(function(){

    /**
     * Implemento datagrid para usuarios anulo bootgrid
     */

    var usuariosTable = $('#usuarios_data').DataTable({
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        language: {
            "url":"https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
          },
        select:true,
        "pagingType": "full_numbers",
        select:{
           style:'multi'
        },
        ajax:{
            url: base_url + 'usuarios/fetch_data',
            'beforeSend': function (request) {
                request.setRequestHeader("Authorization","eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9");
                request.setRequestHeader("Subscription-Key","1d64412357444dc4abc5fe0c95ead172");
            } ,
            data: {
                    'baja' : function(){
                        return $('#bajaUsuarios').prop('checked');
                    },
                },
            type: 'POST',
            cache: false, 
            dataSrc: ""
        },
        
        columns: [
            { "data": "id"},
            { "data": "nombre"},
            { "data": "apellido"},
            { "data": "email"},
            { "data": "pNom"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm ' id='btnEditarUsuario'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm ' id='btnBorrarUsuario'><i class='material-icons'>delete</i></button></div></div>"}
        ],
        "scrollY":        "340px",
           "scrollCollapse": true,
           Destroy: true,
           
         
     })
     //fin grilla usuarios

    //clicl en el boton para agregar un nuevo usuario
    $('#add_button_usuario').click(function(){
        $('#usuarios_form')[0].reset();
        $('.modal-title').text("Add Usuario");
        $('#action').val("Add");
        $('#operation').val("Add");
        getPerfil();
    });

    //click en Submit del formulario de alta de usuarios
    $(document).on('submit', '#usuarios_form', function(event){
        event.preventDefault();
        var nombre = $('#nombre').val();
        var apellido = $('#apellido').val();
        var email = $('#email').val();
        var usuario = $('#usuario').val();
        var password = $('#password').val();
        var pass2 = $('#pass2').val();
        var perfil = getPerfilID();
        var form_data = $(this).serialize();
        if(nombre != '' && apellido != '' &&  email != '' &&  usuario != '' &&  password != '' &&  perfil != ''){
            if (password != pass2) {
                alert("Las Contraseñas no coinciden");
            }else{
                $.ajax({
                    url:base_url + 'nuevo_usuario/save',
                    method:"POST",
                    data:form_data,
                    success:function(data){
                        if (data.error!=null) {
                            
                            console.log(data);
                            $.each(data, function(key, error){
                                alert(key + ": " + error.pass2);
                                
                            })
                            
                        }else{
                            alert(data.success);
                        }
                        $('#usuarios_form')[0].reset();
                        $('#usuariosModal').modal('hide');
                        usuariosTable.ajax.reload(null, null);
                    }
                });
            }
            
        }
        else
        {
            alert("Todos los Campos Son requeridos");
        }
    });

    //click chekbox usuarios
    $('#bajaUsuarios').on('click', function(event){
        usuariosTable.ajax.reload(null, false);
    })


    //click en boton editar usuarios
    $(document).on("click", "#btnEditarUsuario", function(){
        getPerfil();
        $('#operation').val('Edit');//editar
        fila = $(this).closest("tr");	        
        var id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
        var nombre = fila.find('td:eq(1)').text();
        var apellido = fila.find('td:eq(2)').text();
        var email = fila.find('td:eq(3)').text();
        var perfil = fila.find('td:eq(4)').text();
        if ($('#bajaUsuarios').is(':not(:checked)')) {
             $('#bajaUsuariosModal').attr('checked', false);
        } else {
            $('#bajaUsuariosModal').attr('checked', true);
        }
        $('#bajaUsuarioModal').val()
        // Capturo el texto del td de la imagen
        $("#nombre").val(nombre);
        $("#apellido").val(apellido);
        $("#email").val(email);
        $("#usuario").val(email);
        //ver como le sellecciono el perfil
        $('.modal-title').text("Editar Usuario");
        $('#usuario_id').val(id);
        $('#action').val('Edit');
        $('#operation').val('Edit');   
        $('#usuariosModal').modal("show");
    });


    //Clcick Borrar usuario
    $(document).on("click", "#btnBorrarUsuario", function(){		        
        fila = $(this);
        id = parseInt($(this).closest('tr').find('td:eq(0)').text()); //capturo el ID		            
        nombre = $(this).closest('tr').find('td:eq(1)').text();
        var respuesta = confirm("Elminará el pruducto " + nombre + "?");
        if (respuesta) {
            $.ajax({
                url:base_url + 'usuarios/delete_data',
                method:"POST",
                data:{id:id},
                success:function(data){
                    alert(data.success);
                    usuariosTable.ajax.reload(null, false);
                }
            })
        }
    });

/* Implemento free-jqgrid par productosv2. Admin */
    var urlImg = base_url + "assets/img/productos/";
    var tablaProuctos = $("#product_data").DataTable({
        
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            language: {
                "url":"https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
              },
            select:true,
            "pagingType": "full_numbers",
            select:{
               style:'multi'
            },
            
            ajax:{
                url: base_url + 'productos/fetch_data',
                'beforeSend': function (request) {
                    request.setRequestHeader("Authorization","eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9");
                    request.setRequestHeader("Subscription-Key","1d64412357444dc4abc5fe0c95ead172");
                } ,
                data: {
                        'baja' : function(){
                            return $('#baja').prop('checked');
                        },
                    },
                type: 'POST',
                cache: false, 
                dataSrc: "rows"
            },
            
            columns: [
                { "data": "id"},
                { "data": "descripcion"},
                { "data": "desc"},
                { "data": "price"},
                { "data": "stock"},
                { "data": "image",
                  "render": function(data, type, row){
                      return '<img id="laimg" src="'+ urlImg + data +'" height="75" width="75"/>';
                    }},

                {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
                
                               
            ],
            "scrollY":        "340px",
            "scrollCollapse": true,
            Destroy: true,
            
            
    }); 

    /**
     * Tabla de Productos en cargados al carrito
     */

    var tablaProductosCarrito = $("#CarritoList").DataTable({
        
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        language: {
            "url":"https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
          },
        select:true,
        "pagingType": "full_numbers",
        select:{
           style:'multi'
        },
        
        ajax:{
            url: base_url + 'carrito_items',
            'beforeSend': function (request) {
                request.setRequestHeader("Authorization","eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9");
                request.setRequestHeader("Subscription-Key","1d64412357444dc4abc5fe0c95ead172");
            } ,
            type: 'POST',
            cache: false,
            total: 'total', 
            dataSrc: 'rows'
        },
        
        columns: [
            { "data": "id"},
            { "data": "rowid", "visible": false},
            { "data": "name"},
            { "data": function (data) {
                return '<input type="text" id="qty" style="width:50px" value="' + data.qty + '">';
                }
            },                   
            { "data": "price"},
            { "data": function(data){
                return data.qty*data.price;
            }}
        ],
        "scrollY":        "340px",
        "scrollCollapse": true,
        Destroy: true,
    
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ? i.replace(/[\$,]/g, '')*1 : typeof i === 'number' ? i : 0;
                };

            // Total price over all pages
            total = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total overPrice this page
            pageTotal = api
                .column( 5, { page: 'Actual'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            

            // Update footer
            $( api.column( 4 ).footer() ).html(
                '$'+pageTotal  +' ( $'+ total +' total)'
            );    
        }      
    });

    

    tablaProductosCarrito.on("change", "input[type='text']", function (evtObj) {
        
        fila = $(this).closest('tr');
        var id = $(this).closest('tr').find('td:eq(0)').text();
        var qty = parseInt(this.value);
        var table = $('#CarritoList').DataTable();
        var nodes = table.row(fila).data();
        rowId= nodes['rowid'];
        if (parseInt(qty)== 0) {
            if (confirm("Esto eliminara el producto. Descea eliminar el producto")) {
                $.ajax({
                    url: base_url + 'carrito/modificar',
                    method: 'POST',
                    data:{
                        'rowid': rowId,
                        'qty': qty
                    },
                    success:function (data) {
    
                        tablaProductosCarrito.ajax.reload(null, null);  
                    }
                })       
            } 
        }else{
            $.ajax({
                url: base_url + 'carrito/modificar',
                method: 'POST',
                data:{
                    'rowid': rowId,
                    'qty': qty
                },
                success:function (data) {

                    tablaProductosCarrito.ajax.reload(null, null);  
                }
            })
        }
        
    })

  

    /*fin tabla carritoList*/


    
    

    /**
     * Tabala de productos para clientes
     */
     var urlImg = base_url + "assets/img/productos/";

     var tablaProuctosCli = $("#product_dataCli").DataTable({
         
             "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
             language: {
                 "url":"https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
               },
             select:true,
             'beforeSend': function (request) {
                request.setRequestHeader("Authorization","eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9");
                request.setRequestHeader("Subscription-Key","1d64412357444dc4abc5fe0c95ead172");
            } ,
                     
             ajax:{
                 url: base_url + 'productos/fetch_data',
                
                 data: {
                     stokmin: 0,
                 },
                 type: 'POST',
                 cache: false, 
                 dataSrc: "rows"
             },
             
             columns: [
                 { "data": "id"},
                 { "data": "descripcion"},
                 { "data": "desc"},
                 { "data": "price"},
                 { "data": "image",
                   "render": function(data, type, row){
                       return '<div class="justify-content-center" id="gallery" data-toggle="modal" ><div class="col-12 col-sm-6 col-lg-3"><img id="imgCell" src="'+ urlImg + data +'" height="75" width="75"/></div></div>';
                    }},                 
                                
             ],
             "scrollY":        "340px",
             "scrollCollapse": true,
             Destroy: true,     
     });

    

    var fila;

    /* clicn en imagen abre modal en vista de clientes */
    $(document).on("click", "#imgCell", function(){		        
        fila = $(this).closest("tr");	        
        id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
        descripcion = fila.find('td:eq(1)').text();
        cat = fila.find('td:eq(2)').text();
        price = fila.find('td:eq(3)').text();
        cadena = fila.find('img')[0].src;
        image = cadena.split("/");
        stockMax = getStock(id);
        $('#id').val(id);
        $("#descripcion").val(descripcion)
        $('#stock').attr('max', stockMax);
        $("#price").val(price);
        $("#imgProduct").attr("src", base_url + "assets/img/productos/" + image[7]);
        $('.modal-title').text("Producto");
        $('#imageModal').modal("show");
    });


    /**
     * click en el boton para agregar items al carro
     * 
     * dejé los input activados.
     * DEberíam}n estra desacrivados y antes de anviar el form activarlos para que pase la data
     * en POST
     * 
     * enviar con el formulario el codigo de producto, el precio y la cantidad
     * 
     */
     $('#produc_form_car').submit(function(e){
        e.preventDefault();
        $('#price').prop('disabled', false);
        $('#descripcion').prop('disabled', false);
        if (parseInt(price, 10) >=0) {
            $.ajax({
                url: base_url + 'cart/add',
                type:"POST",
                data:new FormData(this),
                processData: false,
                contentType: false,
                success: function(data){
                    $('#price').prop('disabled', true);
                    $('#descripcion').prop('disabled', true);
                    $("#imageModal").modal('hide');
                    tablaProuctos.ajax.reload(null, null);
                    alert(data.response);
                }
            });     
        } else {
            alert("El Monto debe ser o igual a 0");
        }                       
        
        
    });







    /**
     * click en submit del formulario modal en vista de 
     * Admin para agregar y modificar prod
     */
    $('#produc_form').submit(function(e){
        e.preventDefault();
        descripcion = $("#descripcion").val();
        cat = getCatID;
        price = $("#price").val();
        stock = $("#stock").val();
        if (descripcion!="" && cat != "" && price != "" && stock != "" && cat != null ) {
            if (parseInt(price, 10) >=0) {
                $.ajax({
                    url: base_url + 'productos/action',
                    type:"POST",
                    data:new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(data){
                        $("#producModal").modal('hide');
                        tablaProuctos.ajax.reload(null, null);
                        alert(data.response);
                    }
                });     
            } else {
                alert("El Monto debe ser o igual a 0");
            }                       
        } else {
            alert("todos los compos son necesarios" + descripcion + "," + cat + "," + price + "," + stock);
        }
        
    });

    

    /**
     * Al hacer click en el boton Add
     * se blanquea el formulario prodcutos
     */
    $(document).on("click", "#add_buttonP", function(e){
        e.preventDefault();
        getCat();
        //determino la operacion, blanqueola imagen, blanqueo los campos
        $("#produc_form").trigger("reset")
        $('.modal-title').text("Add Producto");
        $('#operation').val("Add");
        $('#action').val("Add");
        $("#descripcion").val();
        $("#gender").val();
        $("#price").val();
        $('#stock').val();
        $('#output').attr(src, '');
        $('#producModal').modal("show");
    });


    //Editar producto
    $(document).on("click", ".btnEditar", function(){
        getCat();
        $('#operation').val('Edit');//editar
        fila = $(this).closest("tr");	        
        id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
        descripcion = fila.find('td:eq(1)').text();
        cat = fila.find('td:eq(2)').text();
        price = fila.find('td:eq(3)').text();
        stock = fila.find('td:eq(4)').text();
        // Capturo el texto del td de la imagen
        cadena = fila.find('img')[0].src;
        //separo el texto de la url 
        image = cadena.split("/");
        $("#descripcion").val(descripcion);
        $("#cat").val(cat);
        $("#gender").val(cat);
        $("#price").val(price);
        $("#stock").val(stock);
        $("#output").attr("src", base_url + "assets/img/productos/" + image[7]);
        $('.modal-title').text("Editar Producto");
        $('#id').val(id);
        $('#action').val('Edit');
        $('#operation').val('Edit');   
        $('#producModal').modal("show");
    });

    


    //Borrar producto
    $(document).on("click", ".btnBorrar", function(){		        
        fila = $(this);
        id = parseInt($(this).closest('tr').find('td:eq(0)').text()); //capturo el ID		            
        descripcion = $(this).closest('tr').find('td:eq(1)').text();
        var respuesta = confirm("Elminará el pruducto " + descripcion + "?");
        if (respuesta) {
            $.ajax({
                url:base_url + 'productos/delete_data',
                method:"POST",
                data:{id:id},
                success:function(data){
                    tablaProuctos.row(fila.parents('tr')).remove().draw();
                }
            })
        }
    });

    //click chekbox
    $('#baja').on('click', function(event){
        tablaProuctos.ajax.reload(null, false);
    })
      
    

    
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

//
//ajax carga selec con las categorias
//
function getCat(){
    $('#cat').empty();
    $.ajax({
        type: "GET",
        url: base_url + '/categorias/fetch_data',
        async: false,
        dataType: "json",
        success: function(data){
            
            $.each(data, function(key, categoria){
                $("#cat").append('<option value='+categoria.id+'>' + categoria.descripcion+'</option>');
                
            })
        },
        error: function(){
            alert("Some Error");
        }
    })
};

function getCatID(){
    $('#cat').on('change',function(){
        var a = this.value; 
        return a;
    })
}

//
//ajax carga selec con los perfiles
//
function getPerfil(){
    $('#perfil').empty();
    $.ajax({
        type: "GET",
        url: base_url + 'perfil/fecth_data',
        async: false,
        dataType: "json",
        success: function(data){
            $.each(data, function(key, perfil){
                $("#perfil").append('<option value='+perfil.id+'>' + perfil.nombre+'</option>');
                
            })
        },
        error: function(){
            alert("Error en la Carga de Pefiles");
        }
    })
};

function getPerfilID(){
    $('#perfil').on('change',function(){
        return this.value;
    })
}

function getStock(id){
    var stock = null;
    
    $.ajax({
        type: "POST",
        url: base_url + '/productos/fetch_single_data',
        async: false,
        dataType: "json",
        data:{id:id},
        success: function(data){
            stock = data.stock;
        },
        error: function(){
            alert("Some Error");
        }
    })

    return stock;
}