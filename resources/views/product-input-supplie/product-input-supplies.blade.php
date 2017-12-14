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
                            <h4 class="card-title">Mis insumos del proveedor
                                <button type="button" class="btn pull-right hidden-sm-down btn-success"
                                        data-toggle="modal" data-target="#register-product-input-supplie-modal">
                                    Agregar Insumo del proveedor
                                </button>
                                @include('product-input-supplie.register')
                            </h4>
                            <h6 class="card-subtitle">Puedes buscar un insumo: <code>ingresa el nombre del insumo</code>
                            </h6>
                            <div class="table-responsive">
                                <table class="table stylish-table">
                                    <thead>
                                    <tr>
                                        <th>Nombre del insumo</th>
                                        {{--<th>Porcentaje</th>--}}
                                        {{--<th>Insumos usados</th>--}}
                                        <th>Insumos registrados</th>
                                        <th>Total en Unidades</th>
                                        <th>Fecha</th>
                                        <th>Recargar</th>
                                        <th>Editar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($productsInputSupplie as $productInputSupplie)
                                        @php $porcentage = number_format(((100 * $productInputSupplie->quantity_discount) / $productInputSupplie->quantity), 2);@endphp
                                        <tr>
                                            <td>
                                                <h6>{{ $productInputSupplie->name }}</h6>
                                                <small class="text-muted">Equivale
                                                    a {{ $productInputSupplie->amount }} {{ $productInputSupplie->measure }}
                                                </small>
                                                @if($porcentage == 0)
                                                    <small class="text-muted"> <span class="text-danger">Agotado</span></small>
                                                @endif
                                            </td>

                                            {{--@if($porcentage >= 70)--}}
                                                {{--<td>--}}
                                                    {{--<span class="text-success">{{ $porcentage }} %</span>--}}
                                                    {{--<div class="progress">--}}
                                                        {{--<div class="progress-bar bg-success" role="progressbar"--}}
                                                             {{--style="width: {{ $porcentage }}%; height: 6px;"--}}
                                                             {{--aria-valuenow="25" aria-valuemin="0"--}}
                                                             {{--aria-valuemax="100"></div>--}}
                                                    {{--</div>--}}
                                                {{--</td>--}}
                                            {{--@elseif($porcentage >= 30 && $porcentage < 70)--}}
                                                {{--<td>--}}
                                                {{--<span class="text-warning">{{ $porcentage }}--}}
                                                    {{--%</span>--}}
                                                    {{--<div class="progress">--}}
                                                        {{--<div class="progress-bar bg-warning" role="progressbar"--}}
                                                             {{--style="width: {{ $porcentage }}%; height: 6px;"--}}
                                                             {{--aria-valuenow="25" aria-valuemin="0"--}}
                                                             {{--aria-valuemax="100"></div>--}}
                                                    {{--</div>--}}
                                                {{--</td>--}}
                                            {{--@else--}}
                                                {{--<td>--}}
                                                {{--<span class="text-danger">{{ $porcentage }}--}}
                                                    {{--%</span>--}}
                                                    {{--<div class="progress">--}}
                                                        {{--<div class="progress-bar bg-danger" role="progressbar"--}}
                                                             {{--style="width: {{ $porcentage }}%; height: 6px;"--}}
                                                             {{--aria-valuenow="25" aria-valuemin="0"--}}
                                                             {{--aria-valuemax="100"></div>--}}
                                                    {{--</div>--}}
                                                {{--</td>--}}
                                            {{--@endif--}}


                                            {{--<td>--}}
                                                {{--{{ $productInputSupplie->quantity_discount}}--}}
                                                {{--<small class="text-muted">--}}
                                                    {{--({{ $productInputSupplie->measure }})--}}
                                                {{--</small>--}}
                                            {{--</td>--}}
                                            <td>
                                                {{ $productInputSupplie->quantity}}
                                                <small class="text-muted">
                                                    ({{ $productInputSupplie->measure }})
                                                </small>
                                            </td>
                                            <td>
                                                {{ number_format($productInputSupplie->quantity_discount /  $productInputSupplie->amount, 2) }}
                                                <small class="text-muted">
                                                    (unidad(es))
                                                </small>
                                            </td>
                                            <td>
                                                <small class="text-muted">
                                                    {{ date('Y-m-d') }}
                                                </small>
                                            </td>
                                            <td>
                                                <button type="button" class="btn hidden-sm-down btn-warning"
                                                        data-toggle="modal"
                                                        data-target="#update-product-{{ $productInputSupplie->id }}">
                                                    <span class="fa fa-refresh"></span>
                                                </button>
                                                {{--@include('product-input.update-product-input')--}}
                                            </td>
                                            <td>
                                                <button type="button" class="btn hidden-sm-down btn-success"
                                                        data-toggle="modal"
                                                        data-target="#update-product-{{ $productInputSupplie->id }}">
                                                    <span class="fa fa-arrow-up"></span>
                                                </button>
                                                {{--@include('product-input.update-product-input')--}}
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