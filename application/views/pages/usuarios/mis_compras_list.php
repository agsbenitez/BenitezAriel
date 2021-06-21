<div class="container box">
        <h3 align = "center">Listado de Compras</h3><br />
        <div class="panel panel-default">
            <div class="panel-heading">
            <div class="row">
                    <div class="col-md-10">
                        
                    </div>
                    <!-- <div class="col-md-2" align="right">
                        <button type="button" id="save_compra" data-toggle="modal"  class="btn btn-info btn-xs">Pagar Compra</button>
                    </div> -->
                </div>
                
            </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="misComprasList" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Fecha</th>
                                    <th>Monto</th>
                                </tr>
                            </thead>
                            <tbody>                           
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2" style="text-align:right">Total:</th>
                                    <th></th>
                                </tr>
                            </tfoot>

                        </table>
                        <div id="pager"></div>
                    </div>
                </div>
       </div>
    </div>


<!--Modale para el detalle-->
    <div id="tablaModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="table-responsive">
                        <table id="misComprasDetailModal" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody id="detail">                           
                            </tbody>
                            
                        </table>
                        <div id="pager"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>

