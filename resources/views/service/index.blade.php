@extends('layouts.app')

@section('content')
<div class="container">
    <button class="btn btn-primary"
          role="button"
          data-toggle="collapse"
          href="#serviceAddForm"
          aria-expanded="false"
          aria-controls="serviceAddForm">
          Добавить сервис
    </button>
    <div class="collapse" id="serviceAddForm">
        <div class="well">
            <div class="panel">
                <div class="panel-heading">
                     Укажите описание нового сервиса
                </div>
                <div class="panel-body">
                    <!-- display validation errors -->
                    @include('common.errors')

                    <form action="{{ url('service') }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="service_name" class="col-form-label">наименование:</label>
                            <div>
                                <input type="text" name="service_name" id="service_name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="service_desc" class="col-form-label">описание:</label>
                            <div>
                                <textarea rows="5" name="service_desc" id="service_desc" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div>
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

  @if (count($services) > 0)
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>наименование</th>
                <th>описание</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($services as $service)
                <tr>
                  <td>{{ $service->id }}</td>
                  <td>{{ $service->service_name }}</td>
                  <td>{{ $service->service_desc }}</td>
                  <td>
                    <form action="{{url('service/' . $service->id)}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                      <button type="submit" id="del-service-{{$service->id}}" class="btn btn-danger">
                        <i class="fa fa-btn fa-trash"></i>Удалить
                      </button>
                    </form>
                  </td>
                  <td>
                    <form action="{{url('service/' . $service->id . '/edit')}}" method="get">
                      {{ csrf_field() }}
                      <button type="submit" id="edit-service-{{$service->id}}" class="btn btn-primary">
                        <i class="fa fa-btn fa-edit"></i>Исправить
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  @endif
</div>
@endsection
