@extends('layouts.base')
@section('content')
<h1>Lista de Encomiendas</h1>
<label for="Crear">Nueva Encomienda</label>
<a href="{{url('package/create')}}" class="btn btn-primary">Crear</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Servicio</th>
      <th scope="col">Cliente</th>
      <th scope="col">Ejecutivo</th>
      <th scope="col">Detalles</th>
      <th scope="col">CRUD</th>
    </tr>
  </thead>
  <tbody>
    @foreach($package as $package)
    <tr>
      <th scope="row">{{$package->id}}</th>
      <td>{{$package->type_service}}</td>
      <td>{{$package->client_id}}</td>
      <td>{{$package->user->name}}</td>
      <td><a href="show/{{$package->id}}" >{{$package->id}}</a></td>
      <td>
          <a href="edit/{{$package->id}}" class="btn btn-success">Edit</a>
      </td>
      <td>
            <form action="delete/{{$package->id}}" method="post">
            @csrf
            @method('DELETE')
             <button class="btn btn-danger" type="submit">Delete</button>
          </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
