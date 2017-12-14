<!-- Modal -->
<div class="modal fade" id="register-product-input-supplie-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 150%; margin-left: -20%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Agregar insumo del proveedor</h4>
            </div>
            <!-- ============================================================== -->
            <!-- Start Form -->
            <!-- ============================================================== -->
            <form class="form-horizontal form-material" action="{{ route('register-product-input-supplie') }}"
                  method="post"
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
                                        <label class="col-md-12">Nombre del insumo</label>
                                        <div class="col-md-12">
                                            <input required type="text" placeholder="Ejemplo: Bote de endulsante"
                                                   class="form-control form-control-line" name="name" id="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{--<div class="form-group">--}}
                                        {{--<label for="example-email" class="col-md-12">Precio del insumo</label>--}}
                                        {{--<div class="col-md-12">--}}
                                            {{--<input required type="number" placeholder="Ejemplo: 125.00"--}}
                                                   {{--class="form-control form-control-line" name="price" id="price">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12">Cantidad del insumo</label>
                                        <div class="col-md-12">
                                            <input type="number" min="1" id="quantity"
                                                   placeholder="Ejemplo: 14, 1, 4"
                                                   class="form-control form-control-line" name="amount" id="amount">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
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

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12">Cantidad</label>
                                        <div class="col-md-12">
                                            <input type="number" min="1" max="100" id="quantity"
                                                   placeholder="Ejemplo: 2 o 3 botes, galones"
                                                   class="form-control form-control-line" name="quantity" id="quantity">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-12">Seleccione un proveedor</label>
                                        <div class="col-sm-12">
                                            <select class="form-control form-control-line" name="supplies_id" id="supplies_id">
                                                @foreach($supplies as $supply)
                                                    <option value="{{ $supply->id }}"> {{ $supply->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
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
                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                </div>
            </form>
            <!-- ============================================================== -->
            <!-- End Form -->
            <!-- ============================================================== -->
        </div>
    </div>
</div>