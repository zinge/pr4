@extends('layouts.app')

@section('content')
  <div class="container">
    <button class="btn btn-primary" role="button" data-toggle="collapse" href="#equiptypeAddForm" aria-expanded="false" aria-controls="equiptypeAddForm">
      Добавить тип оборудования
    </button>
    <div class="collapse" id="equiptypeAddForm">
      <div class="well">
        <div class="panel">
          <div class="panel-heading">
            Укажите описание нового элемента
          </div>
          <div class="panel-body">
            <!-- display validation errors -->
            @include('common.errors')

            <form action="{{ url('equiptype') }}" method="post" class="form-horizontal">
              {{ csrf_field() }}
              <div class="form-group row">
                <label for="equiptype_desc" class="col-form-label">описание:</label>
                <div>
                  <input type="text" name="equiptype_desc" id="equiptype_desc" class="form-control">
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

    @if (count($equiptypes) > 0)
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Описание</th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($equiptypes as $equiptype)
                  <tr>
                    <td>{{ $equiptype->id }}</td>
                    <td>{{ $equiptype->equiptype_desc }}</td>
                    <td>
                      <form action="{{url('equiptype/' . $equiptype->id)}}" method="post">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <button type="submit" id="del-equiptype-{{$equiptype->id}}" class="btn btn-danger">
                          <i class="fa fa-btn fa-trash"></i>Удалить
                        </button>
                      </form>
                    </td>
                    <td>
                      <form action="{{url('equiptype/' . $equiptype->id . '/edit')}}" method="get">
                        {{ csrf_field() }}
                        <button type="submit" id="edit-equiptype-{{$equiptype->id}}" class="btn btn-primary">
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
