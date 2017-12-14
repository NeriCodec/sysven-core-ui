<!-- Modal -->
<div class="modal fade" id="add-product-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 150%; margin-left: -20%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Agregar producto</h4>
            </div>
            <!-- ============================================================== -->
            <!-- Start Form -->
            <!-- ============================================================== -->
            <form class="form-horizontal form-material" action="{{ route('register-product') }}" method="post"
                  id="form-product">
                <div class="modal-body">
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <div class="card">
                        <div class="card-block">
                            {{ csrf_field() }}
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12">Nombre del producto</label>
                                        <div class="col-md-12">
                                            <input required type="text" placeholder="Ejemplo: Frappe Clasico"
                                                   class="form-control form-control-line" name="name" id="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Precio del producto</label>
                                        <div class="col-md-12">
                                            <input required type="number" placeholder="Ejemplo: 125.00"
                                                   class="form-control form-control-line" name="price" id="price">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12">Cantidad de insumo</label>
                                        <div class="col-md-12">
                                            <input type="number" id="quantity" placeholder="Ejemplo: 14, 1, 4"
                                                   class="form-control form-control-line" name="quantity" id="quantity">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-12">Insumos a utilizar</label>
                                        <div class="col-sm-12">
                                            <select class="form-control form-control-line" name="measure" id="measure">
                                                @foreach($productInputs as $productInput)
                                                    <option>{{ $productInput->measure }} de {{ $productInput->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button type="button" id="button-add-input" class="btn pull-right btn-default">
                                        Agregar insumo
                                    </button>
                                </div>
                            </div>
                            <h6 class="card-subtitle">Presiona el insumo para eliminarlo</h6>
                            <div class="row">

                                <div class="col-md-12">
                                    <div id="my-inputs">

                                    </div>
                                </div>
                            </div>
                            {{--<textarea class="form-control form-control-line" name="textarea-inputs" id="textarea-inputs"--}}
                            {{--rows="5" disabled>--}}

                            {{--</textarea>--}}
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                </div>
            </form>
            <!-- ============================================================== -->
            <!-- End Form -->
            <!-- ============================================================== -->
        </div>
    </div>
</div>