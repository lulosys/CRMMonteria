<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
    <!-- Your custom  HTML goes here -->
    <table class='table table-striped table-bordered'>
        <thead>
        <tr>
            <th>Paciente</th>
            <th>Dias</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <!-- To make sure we have read access, wee need to validate the privilege -->
                    @if(CRUDBooster::isUpdate() && $button_edit)
                        <a class='btn btn-success btn-sm' href='{{CRUDBooster::mainpath("edit/$row->id")}}'>Edit</a>
                    @endif

                    @if(CRUDBooster::isDelete() && $button_edit)
                        <a class='btn btn-success btn-sm' href='{{CRUDBooster::mainpath("delete/$row->id")}}'>Delete</a>
                    @endif
                </td>
            </tr>

        </tbody>
    </table>


@endsection