@extends('template.dashboard')

@section('page-wrapper')

    <div class="page-wrapper">

        <div class="container-fluid">

            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- Row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Mis productos
                                <button type="button" class="btn pull-right hidden-sm-down btn-success"
                                        data-toggle="modal" data-target="#add-product-modal">
                                    Agregar Producto
                                </button>
                                @include('product.register')
                            </h4>
                            <div class="table-responsive m-t-40">
                                <table class="table stylish-table">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Nombre del producto</th>
                                        <th>Precio</th>
                                        <th>Editar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)

                                        <tr>
                                            <td style="width:50px;"><span
                                                        class="round">{{ substr($product->name, 0, 1) }}</span></td>
                                            <td>
                                                <h6>{{ $product->name }}</h6>
                                                <small class="text-muted">{{ count($product->inputs) }} insumo(s)
                                                </small>
                                            </td>
                                            <td>${{ $product->price }} - Quetzales</td>
                                            <td>
                                                <button type="button" class="btn hidden-sm-down btn-success"
                                                        data-toggle="modal"
                                                        data-target="#update-product-{{ $product->id }}">
                                                    <span class="fa fa-arrow-up"></span>
                                                </button>
                                                @include('product.update')
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row -->
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->

        </div>

    </div>

@endsection