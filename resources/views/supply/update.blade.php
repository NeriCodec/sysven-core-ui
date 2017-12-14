<!-- Modal -->
<div class="modal fade" id="update-supply-{{ $supply->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Actualizar proveedor</h4>
            </div>
            <!-- ============================================================== -->
            <!-- Start Form -->
            <!-- ============================================================== -->
            <form class="form-horizontal form-material" action="{{ route('update-supply', ['id' => $supply->id]) }}" method="post">
                {{ csrf_field() }}
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
                                    <input type="text" value="{{ $supply->name }}" placeholder="Ejemplo: Juan Ramirez" class="form-control form-control-line" name="name" id="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Direccion del proveedor</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $supply->address }}" placeholder="Ejemplo: Lago Winnipeg" class="form-control form-control-line" name="address" id="address">
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
            <form action="{{ route('delete-supply', ['id' => $supply->id]) }}" method="post">
                {{ csrf_field() }}
                <button type="submit" class="btn hidden-sm-down btn-danger" style="width:100%">
                    <span class="fa fa-window-close"></span>
                    Eliminar proveedor
                </button>
            </form>
        </div>
    </div>
</div>