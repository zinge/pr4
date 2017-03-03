@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>наименование</th>
                <th>описание</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $service->service_name }}</td>
                <td>{{ $service->service_desc }}</td>
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
        <form action="{{ url('service/'.$service->id ) }}" method="post" class="form-horizontal">
            {{ method_field('put') }}
            {{ csrf_field() }}

            <div class="form-group row">
              <label for="service_name" class="col-form-label">наименование:</label>
                <div>
                  <input type="text" name="service_name" id="service_name" class="form-control" value="{{ $service->service_name ? $service->service_name : old('service_name') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="service_desc" class="col-form-label">описание:</label>
                <div>
                  <textarea rows="5" name="service_desc" id="service_desc" class="form-control">{{ $service->service_desc ? $service->service_desc : old('service_desc') }}</textarea>
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
