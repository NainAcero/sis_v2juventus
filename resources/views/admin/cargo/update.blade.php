@extends('layouts.template')

@section('content')
<div class="widget-content-area ">
    <div class="widget-one">
        <form action="{{route('cargos.update', [$cargo->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <h5 class="col-sm-12 text-center">Gestionar Cargos</h5>
                <div class="form-group col-lg-6 col-md-6 col-sm-12 mt-2">
                    <label >Cargo *</label>
                    <input name="cargo" type="text" value="{{ $cargo->cargo }}"  class="form-control" >
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-12 mt-2">
                    <label >Estado *</label>
                    <select class="form-control" name="estado" >
                        <option value="1" {{ ( $cargo->estado == 1) ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ ( $cargo->estado == 0) ? 'selected' : '' }}>Desactivado</option>
                    </select>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-5 mt-2  text-left">
                    <a href="{{url('cargos')}}" type="button" class="btn btn-dark mr-1">
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


