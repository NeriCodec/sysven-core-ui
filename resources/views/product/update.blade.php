<!-- Modal -->
<div class="modal fade" id="update-product-{{ $product->id }}" tabindex="-1" role="dialog">
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
            <form class="form-horizontal form-material" action="{{ route('update-product', ['id' => $product->id]) }}"
                  method="post"
                  id="form-product-updated">
                <div class="modal-body">
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <div class="card">
                        <div class="card-block">
                            {{ csrf_field() }}
                            <h6 class="card-subtitle">* Datos generales del producto</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12">Nombre del producto</label>
                                        <div class="col-md-12">
                                            <input required type="text" value="{{ $product->name }}"
                                                   class="form-control form-control-line" name="name" id="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Precio del producto</label>
                                        <div class="col-md-12">
                                            <input required type="number" value="{{ $product->price }}" min="1"
                                                   class="form-control form-control-line" name="price" id="price">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <h6 class="card-subtitle">* Insumos que contiene el producto</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    @foreach($product->inputs as $productInput)
                                        <button type="button"
                                                style="margin: 5px 5px 5px 5px;" id="button-add-input"
                                                class="btn btn-primary"> {{ $productInput->quantity }}  {{ $productInput->product_input }} </button>
                                    @endforeach
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
            <!-- ============================================================== -->
            <!-- Form -->
            <!-- ============================================================== -->
            <form class="form-horizontal form-material" action="{{ route('delete-product', ['id' => $product->id]) }}"
                  method="post">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger" style="width: 100%">
                    <span class="fa fa-eraser"></span>
                    Eliminar producto
                </button>
            </form>
            <!-- ============================================================== -->
            <!-- Form -->
            <!-- ============================================================== -->
        </div>
    </div>
</div>
{{--update-product-{{ $product->id }}--}}