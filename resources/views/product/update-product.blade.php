<!-- Modal -->
<div class="modal fade" id="update-product-{{ $product->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Actualizar producto</h4>
            </div>
            <!-- ============================================================== -->
            <!-- Start Form -->
            <!-- ============================================================== -->
            <form class="form-horizontal form-material" action="{{ route('update-product', ['id' => $product->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <div class="card">
                        <div class="card-block">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-md-12">Nombre del producto</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $product->name }}" placeholder="Ejemplo: Frappe Clasico" class="form-control form-control-line" name="name" id="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Precio del producto</label>
                                <div class="col-md-12">
                                    <input type="number" value="{{ $product->price }}" placeholder="Ejemplo: 125.00" class="form-control form-control-line" name="price" id="price">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
            <!-- ============================================================== -->
            <!-- End Form -->
            <!-- ============================================================== -->
        </div>
    </div>
</div>