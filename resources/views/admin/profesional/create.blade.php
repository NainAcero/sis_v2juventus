@extends('layouts.template')

@section('content')
<div class="widget-content-area ">
    <div class="widget-one">
        <form action="{{route('profesions.store')}}" method="POST">
            @csrf
            <div class="row">
                <h5 class="col-sm-12 text-center">Gestionar Profesiones</h5>
                <div class="form-group col-lg-6 col-md-6 col-sm-12 mt-2">
                    <label >Nombre *</label>
                    <input name="name" type="text"  class="form-control"  placeholder="Nombre">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-12 mt-2">
                    <label >Descripcion</label>
                    <textarea name="descripcion" class="form-control" rows="4"></textarea>
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


