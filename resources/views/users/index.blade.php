@extends('layouts.plantilla')

@section('content')
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-3">
                    <h3 class="card-title">Usuarios</h3>
                </div>
            </div>      
        </div>
        <div class="card-body">
            <table id="users" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Rol</th>

                  </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                      @if($user->deleted==0)
                        <tr>
                            <td>{{$user->id }}</td>
                            <td>{{$user->firstname }}</td>
                            <td>{{$user->surname }}</td>
                            <td>{{$user->email }}</td>
                            <td>{{$user->type }}</td>
                        </tr>
                      @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
@endsection