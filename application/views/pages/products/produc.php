<div class="container box">
        <h3 align = "center">Listado de Productos</h3><br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-10">
                        
                    </div>
                    <div class="col-md-2" align="right">
                        <button type="button" id="add_button" data-toggle="modal" data-target="#producModal" class="btn btn-info btn-xs">Add</button>
                    </div>
                </div>
                
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="product_data" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th data-column-id="descripcion">Descripcion</th>
                                <th data-column-id="cat">Categoria</th>
                                <th data-column-id="image" data-formatter="image">Imagen</th>
                                <th data-column-id="price">Precio</th>
                                <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
       </div>
    </div>



    <div id="producModal" class="modal fade">
        <div class="modal-dialog">
            <form method="post" id="produc_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Agregar Producto</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Ingrese Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label>Ingrese Categoria</label>
                            <input type="text" name="cat" id="cat" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label>Ingrese Precio</label>
                            <input type="text" name="price" id="price" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <label>Ingrese Imagen</label>
                            <input type="file" name="image" id="image" accept=".pdf,.jpg,.jpeg,.png" class="form-control"></input>
                        </div>
                        <div class="form-group">
                            <p id="status"></p>
                        </div>
                        <div class="form-group">
                            <img id="output" src="" width="200" height="200">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id" />
                        <input type="hidden" name="operation" id="operation"  value="Add"/>
                        <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

