@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>описание</th>
                <th>наименование</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->role_desc }}</td>
                <td>{{ $role->role_name }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Внесите правки в форму ниже
        </div>
        <div class="panel-body">
        @include('common.errors')
        <form action="{{ url('role/'.$role->id ) }}" method="post" class="form-horizontal">
            {{ method_field('put') }}
            {{ csrf_field() }}

            <div class="form-group row">
                <label for="role_desc" class="col-form-label">описание:</label>
                <div>
                    <input type="text" name="role_desc" id="role_desc" class="form-control" value="{{ trim($role->role_desc ? $role->role_desc : old('role_desc')) }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="role_name" class="col-form-label">наименование:</label>
                <div>
                    <input type="text" name="role_name" id="role_name" class="form-control" value="{{ trim($role->role_name ? $role->role_name : old('role_name')) }}">
                </div>
            </div>
            <div class="form-group row">
                <div>
                    <button type="submit" class="btn btn-primary">Исправить</button>
                </div>
            </div>
        </form>
        </div>
    </div>
  </div>
@endsection
