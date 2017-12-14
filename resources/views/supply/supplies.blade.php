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
                        <h4 class="card-title">Mis proveedores
                            <button type="button" class="btn pull-right hidden-sm-down btn-success" data-toggle="modal" data-target="#register-supply-modal">
                                Agregar Proveedor
                            </button>
                            @include('supply.register')
                        </h4>
                        <h6 class="card-subtitle">Puedes buscar un proveedor: <code>ingresa el nombre del proveedor</code></h6>
                        <div class="table-responsive">
                            <table class="table stylish-table">
                                <thead>
                                <tr>
                                    <th>Nombre del proveedor</th>
                                    <th>Direccion</th>
                                    <th>Editar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($supplies as $supply)
                                    <tr>
                                        <td>{{ $supply->name }}</td>
                                        <td>{{ $supply->address }}</td>
                                        <td>
                                            <button type="button" class="btn hidden-sm-down btn-success" data-toggle="modal" data-target="#update-supply-{{ $supply->id }}">
                                                <span class="fa fa-arrow-up"></span>
                                            </button>
                                            @include('supply.update')
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