@extends('layouts.template')

@section('content')
<div class="widget-content-area ">
    <div class="widget-one">
        <form action="{{route('bases.store')}}" method="POST">
            @csrf
            <div class="row">
                <h5 class="col-sm-12 text-center">Gestionar Bases</h5>
                <div class="form-group col-lg-6 col-md-6 col-sm-12 mt-2">
                    <label >Nombre *</label>
                    <input name="base" type="text"  class="form-control"  placeholder="nombre">
                 </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-12 mt-2">
                    <label >Estado *</label>
                    <select class="form-control" name="estado" >
                        <option value="1">Activo</option>
                        <option value="0">Desactivado</option>
                    </select>
                </div>
                <div class="form-group col-sm-12">
                    <label >Dirección *</label>
                    <input name="direccion" type="text" class="form-control"  placeholder="dirección...">
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-5 mt-2  text-left">
                    <a href="{{url('bases')}}" type="button" class="btn btn-dark mr-1">
                        <i class="mbri-left"></i> Regresar
                    </a>
                    <button type="submit"
                        class="btn btn-primary ml-2">
                        <i class="mbri-success"></i> Guardar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection


