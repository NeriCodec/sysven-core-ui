@extends('template.dashboard')

@section('page-wrapper')

    <div class="page-wrapper">

        <div class="container-fluid">

        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- column -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">Mis productos
                            <button type="button" class="btn pull-right hidden-sm-down btn-success" data-toggle="modal" data-target="#add-product-modal">
                                Agregar Producto
                            </button>
                            @include('product.register-product')
                        </h4>
                        <h6 class="card-subtitle">Puedes buscar un producto: <code>ingresa el nombre del producto</code></h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Nombre del producto</th>
                                    <th>Precio</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>$ {{ $product->price }}</td>
                                        <td>
                                            <button type="button" class="btn hidden-sm-down btn-success" data-toggle="modal" data-target="#update-product-{{ $product->id }}">
                                                <span class="fa fa-arrow-up"></span>
                                            </button>
                                            @include('product.update-product')
                                        </td>
                                        <td>
                                            <form action="{{ route('delete-product', ['id' => $product->id]) }}" method="post">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn hidden-sm-down btn-danger">
                                                    <span class="fa fa-window-close"></span>
                                                </button>
                                            </form>
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
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        </div>

    </div>

@endsection