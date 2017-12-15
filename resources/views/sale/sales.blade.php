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
                                <a href="{{ route('sale-register') }}" class="btn pull-right hidden-sm-down btn-success">
                                    <span class="fa fa-shopping-basket"></span>
                                    Comenzar venta
                                </a>
                            </h4>
                            <h6 class="card-subtitle">Puedes buscar una venta: <code>numero de venta</code></h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>No. Venta</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>

                                        </td>
                                    </tr>
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