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
                <td>{{ $address->id }}</td>
                <td>{{ $address->city }}</td>
                <td>{{ $address->streethouse }}</td>
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
        <form action="{{ url('address/'.$address->id ) }}" method="post" class="form-horizontal">
            {{ method_field('put') }}
            {{ csrf_field() }}

            <div class="form-group row">
                <label for="city" class="col-form-label">город:</label>
                <div>
                    <input type="text" name="city" id="city" class="form-control" value="{{ trim($address->city ? $address->city : old('city')) }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="streethouse" class="col-form-label">улица, дом:</label>
                <div>
                    <input type="text" name="streethouse" id="streethouse" class="form-control" value="{{ trim($address->streethouse ? $address->streethouse : old('streethouse')) }}">
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
