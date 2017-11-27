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
                        <h4 class="card-title">Mis insumos
                            <button type="button" class="btn pull-right hidden-sm-down btn-success" data-toggle="modal" data-target="#register-product-input-modal">
                                Agregar Insumo
                            </button>
                            @include('product-input.register-product-input')
                        </h4>
                        <h6 class="card-subtitle">Puedes buscar un insumo: <code>ingresa el nombre del insumo</code></h6>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Nombre del insumo</th>
                                    <th>Medida</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product_inputs as $product_input)
                                    <tr>
                                        <td>{{ $product_input->name }}</td>
                                        <td>{{ $product_input->measure }}</td>
                                        <td>
                                            <button type="button" class="btn hidden-sm-down btn-success" data-toggle="modal" data-target="#update-product-{{ $product_input->id }}">
                                                <span class="fa fa-arrow-up"></span>
                                            </button>
                                            @include('product-input.update-product-input')
                                        </td>
                                        <td>
                                            <form action="{{ route('delete-product-input', ['id' => $product_input->id]) }}" method="post">
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