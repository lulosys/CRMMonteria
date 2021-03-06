<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReporteFinalRequest;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use DateTime;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteFinalController extends Controller
{

    /**
     * Handle the incoming request.
     * @param  ReporteFinalRequest  $request
     * @return View
     */
    public function __invoke(ReporteFinalRequest $request): View
    {
        if ((bool) !CRUDBooster::myId()) {
            CRUDBooster::redirect(CRUDBooster::adminPath(), trans('crudbooster.denied_access'));
        }

        $filter = $request->all();
        $date_filter_start = !empty($filter['created_at_start'])
            ? date_create_from_format('d/m/Y', $filter['created_at_start'])
            : new DateTime();

        $date_filter_end = !empty($filter['created_at_end'])
            ? date_create_from_format('d/m/Y', $filter['created_at_end'])
            : new DateTime();

        $pacientes = DB::select("
    select group_concat(p.autorizacion) autorizacion,
       concat(c.tipo_doc, c.cedula)      CCafiliado,
       concat(c.nombre, ' ', c.apellido) nombre,
       c.telefono,
       if (c.has_acompanante, 'Si','No') acompanante,
       if (c.has_discapacitado, 'Si','No') discapacitado,    
       r.origen rutas,
       group_concat(day(p.fecha))        dias,
       count(dpr.precio)                   cantidad_servicio,
       sum(dpr.precio)                     total
from planillas p
         inner join clientes c on p.client_id = c.id
         inner join detalles_planilla_rutas dpr on p.id = dpr.planilla_id
         inner join empresas e on c.empresa_id = e.id
         inner join carros ca on dpr.carro_id = ca.id
         inner join rutas r on dpr.ruta_id = r.id
    where DATE(p.fecha) between '".$date_filter_start->format('Y-m-d')."' and '".$date_filter_end->format('Y-m-d')."'
group by c.id, r.id");
        return view('planillas.index', compact('pacientes', 'date_filter_start', 'date_filter_end'));
    }
}
