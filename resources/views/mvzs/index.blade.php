@extends('layouts.app')

@section('content')
<div class="container">
    <button class="btn btn-primary"
          role="button"
          data-toggle="collapse"
          href="#mvzAddForm"
          aria-expanded="false"
          aria-controls="mvzAddForm">
          Добавить МВЗ
    </button>
    <div class="collapse" id="mvzAddForm">
        <div class="well">
            <div class="panel">
                <div class="panel-heading">
                     Укажите описание и код нового элемента МВЗ
                </div>
                <div class="panel-body">
                    <!-- display validation errors -->
                    @include('common.errors')

                    <form action="{{ url('mvz') }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="mvz_desc" class="col-form-label">описание:</label>
                            <div>
                                <input type="text" name="mvz_desc" id="mvz_desc" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mvz_cod" class="col-form-label">код:</label>
                            <div>
                                <input type="text" name="mvz_cod" id="mvz_cod" class="form-control">
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

  @if (count($mvzs) > 0)
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Описание</th>
                <th>Код</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($mvzs as $mvz)
                <tr>
                  <td>{{ $mvz->id }}</td>
                  <td>{{ $mvz->mvz_desc }}</td>
                  <td>{{ $mvz->mvz_cod }}</td>
                  <td>
                    <form action="{{url('mvz/' . $mvz->id)}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                      <button type="submit" id="del-mvz-{{$mvz->id}}" class="btn btn-danger">
                        <i class="fa fa-btn fa-trash"></i>Удалить
                      </button>
                    </form>
                  </td>
                  <td>
                    <form action="{{url('mvz/' . $mvz->id . '/edit')}}" method="get">
                      {{ csrf_field() }}
                      <button type="submit" id="edit-mvz-{{$mvz->id}}" class="btn btn-primary">
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
