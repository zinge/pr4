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
                <th>надо</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->name }}</td>
                <td>{{ $tag->nado }}</td>
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
        <form action="{{ url('tag/'.$tag->id ) }}" method="post" class="form-horizontal">
            {{ method_field('put') }}
            {{ csrf_field() }}

            <div class="form-group row">
              <label for="name" class="col-form-label">описание:</label>
              <div>
                <input type="text" name="name" id="name" class="form-control">
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
