<!-- Modal -->
<div class="modal fade" id="register-product-input-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Agregar insumo</h4>
            </div>
            <!-- ============================================================== -->
            <!-- Start Form -->
            <!-- ============================================================== -->
            <form class="form-horizontal form-material" action="{{ route('register-product-input') }}" method="post">
                <div class="modal-body">
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <div class="card">
                        <div class="card-block">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="col-md-12">Nombre del insumo</label>
                                    <div class="col-md-12">
                                        <input required type="text" placeholder="Ejemplo: Pajilla, Vaso grande" class="form-control form-control-line" name="name" id="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Seleccione una medida</label>
                                    <div class="col-sm-12">
                                        <select class="form-control form-control-line" name="measure" id="measure">
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
        </div>
    </div>
</div>