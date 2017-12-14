<!-- Modal -->
<div class="modal fade" id="update-product-{{ $product_input->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Actualizar insumo</h4>
            </div>
            <!-- ============================================================== -->
            <!-- Start Form -->
            <!-- ============================================================== -->
            <form class="form-horizontal form-material" action="{{ route('update-product-input', ['id' => $product_input->id]) }}" method="post">
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
                                    <input type="text" value="{{ $product_input->name }}" placeholder="Ejemplo: Frappe Clasico" class="form-control form-control-line" name="name" id="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Seleccione una medida</label>
                                <div class="col-sm-12">
                                    <select class="form-control form-control-line" name="measure" id="measure">
                                        <option>{{ $product_input->measure }}</option>
                                        <option>Onza(s)</option>
                                        <option>Unidad(es)</option>
                                        <option>Gramo(s)</option>
                                        <option>Chucharada(s)</option>
                                        <option>Paquete</option>
                                    </select>
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
            <!-- ============================================================== -->
            <!-- Form -->
            <!-- ============================================================== -->
            <form class="form-horizontal form-material" action="{{ route('delete-product-input', ['id' => $product_input->id]) }}"
                  method="post">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger" style="width: 100%">
                    <span class="fa fa-eraser"></span>
                    Eliminar insumo
                </button>
            </form>
            <!-- ============================================================== -->
            <!-- Form -->
            <!-- ============================================================== -->
        </div>
    </div>
</div>