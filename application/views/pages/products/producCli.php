<div class="container box">
        <h3 align = "center">Listado de Productos</h3><br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    
                </div>
                
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="product_dataCli" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Descrpcion</th>
                                <th>Categoria</th>
                                <th>Precio</th>
                                <th>Imagen</th>
                                
                            </tr>
                        </thead>
                        <tbody>                           
                        </tbody>
                        
                    </table>
                    <div id="pager"></div>
                </div>
            </div>
       </div>
    </div>


<!--Modale parael crud-->
    <div id="imageModal" class="modal fade">
        <div class="modal-dialog">
            <form method="post" id="produc_form_car">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" id="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Agregar Producto</h4>
                    </div>
                    <div class="modal-body">
                    <div class="form-group">
                        <label>Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" disabled></input>
                        </div>
                        <div class="form-group">
                            <label>Precio</label>
                            <input type="number" name="price" id="price" class="form-control" min="1" disabled></input>
                        </div>
                        <div id="carouselExample" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img id="imgProduct" class="d-block w-100" src="" alt="imagen producto">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Stock</label>
                            <input type="number" name="stock" id="stock" class="form-control" value="1" min="1" max="10" step="1" ></input>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id" />
                        <input type="hidden" name="operation" id="operation"  value="Add"/>
                        <input type="submit" name="action" id="action_car" class="btn btn-success" value="Add" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

