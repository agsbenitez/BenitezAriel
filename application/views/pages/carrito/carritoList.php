<div class="container box">
        <h3 align = "center">Listado de Productos</h3><br />
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="row">
                    <div class="col-md-10">
                        
                    </div>
                    <div class="col-md-2" align="right">
                        <button type="button" id="save_compra" data-toggle="modal"  class="btn btn-info btn-xs">Salvar Compra</button>
                    </div>
                </div>
                
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="CarritoList" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>rowid</th>
                                <th>Descrpcion</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>SubTotal</th>
                            </tr>
                        </thead>
                        <tbody>                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4" style="text-align:right">Total:</th>
                                <th></th>
                            </tr>
                        </tfoot>

                    </table>
                    <div id="pager"></div>
                </div>
            </div>
       </div>
    </div>


<!--Modale parael crud-->
    <div id="imageModal" class="modal fade">
        <div class="modal-dialog">
            <form method="post" id="carritoItemForm">
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

