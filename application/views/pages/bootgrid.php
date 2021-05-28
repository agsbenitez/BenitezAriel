<!-- View file in Codeigniter framework is used for display HTML output on Web page.
This bootgrid.php view file you can find under application/views folder.
Here we have make HTML table as per Bootgrid plugin, and below you can find jQuery code, in which we have initialiaze
jQuery Bootgrid plugin using bootgrid() method. Under this method we have trigger Ajax request for fetch data, 
and under this also we have make edit and delete button also under formatters option. -->


<html>
<head>
    <title>jQuery Bootgrid - Server Side Processing in Codeigniter</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.css" />
    
</head>
<body>
    <div class="container box">
        <h3 align = "center">jQuery Bootgrid - Server Side Processing in Codeigniter</h3><br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="panel-title">Listado de Usuarios</h3>
                    </div>
                    <div class="col-md-2" align="right">
                        <button type="button" id="add_button" data-toggle="modal" data-target="#usuariosModal" class="btn btn-info btn-xs">Add</button>
                    </div>
                </div>
                
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="usuarios_data" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th data-column-id="nombre">Nombre</th>
                                <th data-column-id="apellido">Apellido</th>
                                <th data-column-id="email">Email</th>
                                <th data-column-id="usuario">Usuario</th>
                                <th data-column-id="password">Password</th>
                                <th data-column-id="perfil">Perfil</th>
                                <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
       </div>
    </div>
</body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.js"></script>  
</html>

<div id="usuariosModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="usuarios_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Usuario</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Ingrese Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Ingrese Apellido</label>
                        <input name="apellido" id="apellido" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label>Ingrese Email</label>
                        <input name="email" id="email" class="form-control"></input>
                    </div>
                    
                    <div class="form-group">
                        <label>Ingrese Usuario</label>
                        <input name="usuario" id="usuario" class="form-control"></input>
                    </div>

                    <div class="form-group">
                        <label>Ingrese password</label>
                        <input name="password" id="password" class="form-control"></input>
                    </div>

                    <div class="form-group">
                        <label>Ingrese Perfil</label>
                        <input name="perfil" id="perfil" class="form-control"></input>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="usuario_id" id="usuario_id" />
                    <input type="hidden" name="operation" id="operation" value="Add" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
    
    var usuariosTable = $('#usuarios_data').bootgrid({
        ajax:true,
        rowSelect: true,
        url:"<?php echo base_url('bootgrid/fetch_data'); ?>",
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
                url:"<?php echo base_url(); ?>bootgrid/action",
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
                url:"<?php echo base_url(); ?>bootgrid/fetch_single_data",
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
                    url:"<?php echo base_url(); ?>bootgrid/delete_data",
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
    
});
</script>