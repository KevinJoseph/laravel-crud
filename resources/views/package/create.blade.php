@extends('layouts.base')

@section('content')
    <h1>Crear Encomiendas</h1>
    @include('partials.errors')
    <form action="{{url('package/create')}}" method="post">
       {{csrf_field()}}
        <div class="form-group">
            <label for="typeservice">Tipo de Servicio</label>
            <input class="form-control" type="text" name="type_service" value="{{old('type_service')}}">
        </div>
        <div class="form-group">
            <label for="client_id">Remitente</label>
            <input type="text" class="form-control" name="client_id"> 
        </div>
        <div class="form group">
            <label for="consigned_dni"> Consignado</label>
            <input type="text" class="form-control" name="consigned_dni">
        </div>
        <div class="form group">
            <label for="consigned_name">Nombre Consignado</label>
            <input type="text" class="form-control" name="consigned_name">
        </div>
        <div class="form group">
            <label for="office_origin">Oficina Origen</label>
            <input type="text" class="form-control" name="office_origin">
        </div>
        <div class="form-group">
            <label for="office_destinatio">Oficina Destino</label>
            <input type="text" class="form-control" name="office_destination">
        </div>
        <div class="form-group">
            <label for="type_pay">Tipo de Pago</label>
            <input type="text" class="form-control" name="type_pay">
        </div>
        <div class="form-group">
            <label for="price">Precio</label>
            <input type="text" class="form-control" name="price">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        
        
    </form>
@endsection
