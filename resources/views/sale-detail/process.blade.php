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
                            <h4 class="card-title">Proceso de venta</h4>
                            <form action="{{ route('detail-register') }}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-10">
                                        <input required type="text" id="productName" name="productName" class="form-control"
                                               placeholder="Buscar producto...">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-success" id="button-search-product"
                                                style="height: 48px;">
                                            Agregar
                                        </button>
                                    </div>
                                </div>
                                <br>
                                <input type="hidden" id="productId" name="productId" value="">
                            </form>
                            <div class="row">
                                <div class="table-responsive" style="height:250px; width:98%; overflow-y: scroll;">
                                    <table class="table" id="table-products">
                                        <thead>
                                        <tr>
                                            <th>Nombre del insumo</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Subtotal</th>
                                            <th>Quitar</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($saleDetails as $saleDetail)
                                            <tr>
                                                {{--<td>--}}
                                                    {{--{{ $saleDetail->id }}--}}
                                                {{--</td>--}}
                                                <td>
                                                    {{ $saleDetail->name }}
                                                </td>
                                                <td>
                                                    {{ $saleDetail->quantity }}
                                                </td>
                                                <td>
                                                    {{ $saleDetail->price }} qtz.
                                                </td>
                                                <td>
                                                    {{ $saleDetail->subtotal }} qtz.
                                                </td>
                                                <td>
                                                    <form class="form-horizontal form-material" action="{{ route('detail-delete', ['id' => $saleDetail->salesDetailsId]) }}"
                                                          method="post">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger" >
                                                            X
                                                        </button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br>
                            <div style="background: black;color: #00cc00;font-size: 30px;padding: 0px 20px; margin-bottom: 10px; border-radius: 10px;"
                                 class="pull-right" id="total-price">
                                Total: 0.00 Qtz
                            </div>
                            <br><br><br>
                            <button class="btn btn-success pull-right" style="width: 18%;">
                                Pagar
                            </button>
                            <br><br>
                            <button class="btn btn-warning pull-right" style="width: 18%;">
                                Dejar pendiente
                            </button>
                            <small class="text-muted">{{ 'Fecha: ' . date('Y-m-d') }}</small>
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