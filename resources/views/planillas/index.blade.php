<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .d-flex-xl {
            display: flex;
            width: 100%;
            justify-content: space-between;
            align-items: flex-end;
        }

        @media (max-width: 781px) {
            .d-flex-xl {
                display: block;
            }
        }

    </style>
    <!-- Your custom  HTML goes here -->
    <div class="row">
        <div class="col-xs-12">
            <form class="filter-form form-horizontal d-flex-xl" action="{{ url('admin/reportefindemes') }}">
                @csrf
                <div class="col-md-4 form-group">
                    <label for="created_at_start">Fecha Inicio</label>
                    <div>
                        <input type="text" id="created_at_start" name="created_at_start" class="form-control"
                               value="{{empty($date_filter_start) ? '' : $date_filter_start->format('d/m/Y')}}">

                        @if ($errors->has('created_at_start'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('created_at_start') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>
                <div class="col-md-4 form-group">
                    <label for="created_at_end">Fecha Fin</label>
                    <div>
                        <input type="text" id="created_at_end" name="created_at_end" class="form-control"
                               value="{{ empty($date_filter_end) ? '' : $date_filter_end->format('d/m/Y') }}">

                        @if ($errors->has('created_at_end'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('created_at_end') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 form-group" style="text-align: center; padding-top: 35px; display: flex">
                    <button type="submit" class="btn btn-primary form-control">Buscar</button>
                </div>
            </form>
        </div>
    </div>
    <table class='table table-hover table-striped table-bordered' id="details">
        <thead>
        <tr>
            <th>Autorizacion</th>
            <th>CCafiliado</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Acompanante</th>
            <th>Discapacitado</th>
            <th>Rutas</th>
            <th>Dias</th>
            <th>Cantidad Servicio</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pacientes as $paciente)
            <tr>
                <td>{{ $paciente->autorizacion }}</td>
                <td>{{ $paciente->CCafiliado }}</td>
                <td>{{ $paciente->nombre }}</td>
                <td>{{ $paciente->telefono }}</td>
                <td>{{ $paciente->acompanante }}</td>
                <td>{{ $paciente->discapacitado }}</td>
                <td>{{ $paciente->rutas }}</td>
                <td>{{ $paciente->dias }}</td>
                <td>{{ $paciente->cantidad_servicio }}</td>
                <td id="totaldetails">${{ number_format($paciente->total,0,'.','.') }}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <th colspan="9">TOTAL:</th>
        <th id="grandTotal">0</th>
        </tfoot>
    </table>
    <script type="application/javascript">

        var total = 0;
        $('#details tbody #totaldetails').each(function () {
            total += parseInt($(this).text()
                .replace('.', '')
                .replace('$', ''));
        })
        $('#details tfoot #grandTotal').text('$' + new Intl.NumberFormat("es-CO").format(total));

    </script>
@endsection