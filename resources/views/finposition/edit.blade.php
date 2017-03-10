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
                <td>{{ $finposition->id }}</td>
                <td>{{ $finposition->finposition_desc }}</td>
                <td>{{ $finposition->finposition_cod }}</td>
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
        <form action="{{ url('finposition/'.$finposition->id ) }}" method="post" class="form-horizontal">
            {{ method_field('put') }}
            {{ csrf_field() }}

            <div class="form-group row">
                <label for="finposition_desc" class="col-form-label">описание:</label>
                <div>
                    <input type="text" name="finposition_desc" id="finposition_desc" class="form-control" value="{{ trim($finposition->finposition_desc ? $finposition->finposition_desc : old('finposition_desc')) }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="finposition_cod" class="col-form-label">код:</label>
                <div>
                    <input type="text" name="finposition_cod" id="finposition_cod" class="form-control" value="{{ trim($finposition->finposition_cod ? $finposition->finposition_cod : old('finposition_cod')) }}">
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
