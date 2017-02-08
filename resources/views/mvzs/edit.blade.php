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
                <th>Описание</th>
                <th>Код</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $mvz->id }}</td>
                <td>{{ $mvz->mvz_desc }}</td>
                <td>{{ $mvz->mvz_cod }}</td>
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
        <form action="{{ url('mvz/'.$mvz->id ) }}" method="post" class="form-horizontal">
            {{ method_field('put') }}
            {{ csrf_field() }}

            <div class="form-group row">
                <label for="mvz_desc" class="col-form-label">описание:</label>
                <div>
                    <input type="text" name="mvz_desc" id="mvz_desc" class="form-control" value="{{ trim($mvz->mvz_desc ? $mvz->mvz_desc : old('mvz_desc')) }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="mvz_cod" class="col-form-label">код:</label>
                <div>
                    <input type="text" name="mvz_cod" id="mvz_cod" class="form-control" value="{{ trim($mvz->mvz_cod ? $mvz->mvz_cod : old('mvz_cod')) }}">
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
