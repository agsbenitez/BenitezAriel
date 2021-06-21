<div class="container box">
        <h3 align = "center">Listado de Usuarios</h3><br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-8">
                        
                    </div>
                    <div class="col-md-2">
                        <form action="#">
                            <input type="checkbox" name="baja" id="bajaUsuarios" value=0>
                            <label for="baja">¿Desea ver prodcutos dados de baja?</label>
                        </form> 
                    </div>
                    <div class="col-md-2" align="right">
                        <button type="button" id="add_button_usuario" data-toggle="modal" data-target="#usuariosModal" class="btn btn-info btn-xs">Add</button>
                    </div>
                </div>
                
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="usuarios_data" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th data-column-id="id">Id</th>
                                <th data-column-id="nombre">Nombre</th>
                                <th data-column-id="apellido">Apellido</th>
                                <th data-column-id="email">Email</th>
                                <th data-column-id="perfil">Perfil</th>
                                <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
       </div>
    </div>



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
<!-- 
                        <div class="form-group">
                            <label>Ingrese Usuario</label>
                            <input name="usuario" id="usuario" class="form-control"></input>
                        </div>
 -->
                        <div class="form-group">
                            <label>Ingrese password</label>
                            <input type="password" name="password" id="password" class="form-control "></input>
                        </div>

                        <div class="form-group">
                            <label>Repita password</label>
                            <input type="password" name="pass2" id="pass2" class="form-control "></input>
                        </div>
                        
                        <div class="form-group">
                            <label>Ingrese perfil</label>
                            <select name="perfil" id="perfil" class="form-control">
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <input type="checkbox" name="bajaCheck" id="bajaUsuariosModal" value=0>
                            <label for="baja">baja/alta?</label>
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
</body>
</html>

