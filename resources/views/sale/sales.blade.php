@extends('template.dashboard')

@section('page-wrapper')

    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- column -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Mis ventas
                                <form class="form-horizontal form-material"
                                      action="{{ route('sale-register') }}"
                                      method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-success pull-right" style="width: 18%;">
                                        Comenzar venta
                                    </button>
                                </form>
                            </h4>
                            <h6 class="card-subtitle">Puedes buscar una venta: <code>numero de venta</code></h6>
                            <div class="table-responsive m-t-40">
                                <table class="table stylish-table">
                                    <thead>
                                    <tr>
                                        <th>No. venta</th>
                                        <th>Total</th>
                                        <th>Fecha</th>
                                        <th>Cancelar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sales as $sale)
                                        <tr>
                                            <td>
                                                <h6>{{ $sale->id }}</h6>
                                            </td>
                                            <td>$ {{ $sale->total }} - Quetzales</td>
                                            <td>
                                                {{ $sale->created_at }}
                                            </td>
                                            <td>
                                                <form action="" method="post">
                                                    <button type="button" class="btn btn-danger">
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
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>

@endsection