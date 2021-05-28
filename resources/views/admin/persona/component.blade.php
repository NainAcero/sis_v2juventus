@extends('layouts.template')

@section('content')
<div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">

        <div class="widget-content-area br-4">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 text-center">
                        <h5><b>Personas en el Sistema</b></h5>
                </div>
            </div>
        </div>
        <div class="row justify-content-between mb-4 mt-3">
            <div class="col-md-12 col-lg-12 col-sm-12 mt-2 mb-2 text-right mr-2">
                 <a href="{{url('personas/create')}}" class="btn btn-dark">
                      <i class="la la-file la-lg"></i> REGISTRAR
                 </a>
            </div>
        </div>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered table-hover table-striped table-checkable table-highlight-head mb-4" style="width:100%">
                <thead>
                    <tr>
                        <th class="">DNI</th>
                        <th class="">APELLIDO, NOMBRE</th>
                        <th class="">DIRECCIÓN</th>
                        <th class="">FECHA NACIMIENTO</th>
                        <th class="">CARGO</th>
                        <th class="">BASE</th>
                        <th class="text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($personas as $r)
                    <tr>
                        <td>{{$r->persona->dni}}</td>
                        <td>{{$r->persona->apellido}} , {{$r->persona->nombre}}</td>
                        <td>{{$r->persona->direccion}}</td>
                        <td>
                            {{ ($r->persona->fecha_nacimiento != null)
                                ? \Carbon\Carbon::parse($r->persona->fecha_nacimiento)->format('d-m-Y') : '' }}
                        </td>
                        <td>{{ $r->cargo->cargo ?? '' }}</td>
                        <td>{{ $r->base->base ?? '' }}</td>

                        <td class="text-center">
                            <ul class="table-controls">
                                <li>
                                    <a  href="{{ route('personas.edit', [$r->id]) }}"
                                        data-toggle="tooltip" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                </li>

                                <li>
                                    <a  href="javascript:void(0);" onclick="Confirm({{ $r->id }})"
                                        data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


