@extends('layouts.template')

@section('content')
<div class="widget-content-area ">
    <div class="widget-one">
        <form action="{{route('personas.update', [$record->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <h5 class="col-sm-12 text-center">Gestionar Personas</h5>
                <div class="form-group col-lg-4 col-md-4 col-sm-12">
                    <label >DNI **</label>
                    <input name="dni" type="number" disabled id="dni" value="{{$record->persona->dni}}" class="form-control"  placeholder="dni">
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-12">
                    <label >Nombre **</label>
                    <input name="nombre" id="nombre" type="text" value="{{$record->persona->nombre}}" class="form-control"  placeholder="nombre">
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-12">
                    <label >Apellido **</label>
                    <input name="apellido" id="apellido" type="text" value="{{$record->persona->apellido}}" class="form-control"  placeholder="apellido">
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-12">
                    <label >Teléfono **</label>
                    <input name="telefono" id="telefono" type="text" value="{{$record->persona->telefono}}" class="form-control"  placeholder="telefono">
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-12">
                    <label >Profesión ** </label>
                    <select class="form-control" name="selected_profesion">
                        <option value="0"> -- Seleccione --</option>
                        @foreach ($profesiones as $profesion)
                            <option value='{{ $profesion->id }}' {{ ( $record->persona->profesion_id == $profesion->id) ? 'selected' : '' }}>{{ $profesion->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-8">
                    <label >Dirección **</label>
                    <input name="direccion" value="{{$record->persona->direccion}}" type="text" class="form-control"  placeholder="dirección...">
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-12">
                    <label >Fecha Nacimiento</label>
                    <input name="fecha_nacimiento" value="{{$record->persona->fecha_nacimiento}}" type="date" class="form-control" >
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                    <label >Cargo ** </label>
                    <select class="form-control" name="selected_cargo">
                        @foreach ($cargos as $cargo)
                            <option value='{{ $cargo->id }}' {{ ( $record->cargo_id == $cargo->id) ? 'selected' : '' }}>{{ $cargo->cargo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                    <label >Base </label>
                    <select class="form-control" name="selected_base">
                        <option value="" >Seleccionar Base</option>
                        @foreach ($bases as $base)
                            <option value='{{ $base->id }}' {{ ( $record->base_id == $base->id) ? 'selected' : '' }}>{{ $base->base }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-12">
                    <label >Imagen</label>
                    <input  type="file" class="form-control" id="image"
                        wire:change="$emit('imagenChoosen',this)" accept="image/x-png,image/gif,image/jpeg">
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-12">
                    <label >Firma</label>
                    <input  type="file" class="form-control" id ="image"
                        wire:change="$emit('firmaChoosen',this)" accept="image/x-png,image/gif,image/jpeg">
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

@section('scripts')
    <script>
        $('#dni').keyup(function(e) {
            if($('#dni').val().length > 7) {
                const url = `https://dniruc.apisperu.com/api/v1/dni/${ $("#dni").val() }?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFfbmFjZXJvbUB1bmpiZy5lZHUucGUifQ.NcV9aUSUuJ0Wul85yvonhMfhzfBcvw7zuXdXZCD6P0A`;
                $.getJSON(url, onPersonLoaded);
            }
        });

        function onPersonLoaded(data) {
            if(data.dni != null && data.nombres != null){
                $('#nombre').val(data.nombres);
                $('#apellido').val(data.apellidoPaterno + ' ' + data.apellidoMaterno);
                toastr.success(data.nombres, 'Usuario Encontrado')
                window.livewire.emit('updateDatos', data);
            }
        }
    </script>
@endsection


