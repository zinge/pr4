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
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $equiptype->id }}</td>
                <td>{{ $equiptype->equiptype_desc }}</td>
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
        <form action="{{ url('equiptype/'.$equiptype->id ) }}" method="post" class="form-horizontal">
            {{ method_field('put') }}
            {{ csrf_field() }}

            <div class="form-group row">
                <label for="equiptype_desc" class="col-form-label">описание:</label>
                <div>
                    <input type="text" name="equiptype_desc" id="equiptype_desc" class="form-control" value="{{ trim($equiptype->equiptype_desc ? $equiptype->equiptype_desc : old('equiptype_desc')) }}">
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
