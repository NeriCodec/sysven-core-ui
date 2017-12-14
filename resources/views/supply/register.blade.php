<!-- Modal -->
<div class="modal fade" id="register-supply-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Agregar proveedor</h4>
            </div>
            <!-- ============================================================== -->
            <!-- Start Form -->
            <!-- ============================================================== -->
            <form class="form-horizontal form-material" action="{{ route('register-supply') }}" method="post">
                <div class="modal-body">
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <div class="card">
                        <div class="card-block">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="col-md-12">Nombre del proveedor</label>
                                    <div class="col-md-12">
                                        <input required type="text" placeholder="Ejemplo: Juan Ramirez" class="form-control form-control-line" name="name" id="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Direccion del proveedor</label>
                                    <div class="col-md-12">
                                        <input required type="text" placeholder="Ejemplo: Lago Winnipeg" class="form-control form-control-line" name="address" id="address">
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