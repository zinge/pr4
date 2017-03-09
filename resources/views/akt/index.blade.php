@extends('layouts.app')

@section('content')
<div class="container">
    <button class="btn btn-primary"
          role="button"
          data-toggle="collapse"
          href="#aktAddForm"
          aria-expanded="false"
          aria-controls="aktAddForm">
          Добавить акт
    </button>
    <div class="collapse" id="aktAddForm">
        <div class="well">
            <div class="panel">
                <div class="panel-heading">
                     Укажите описание нового акта
                </div>
                <div class="panel-body">
                    <!-- display validation errors -->
                    @include('common.errors')

                    <form action="{{ url('akt') }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="akt_name" class="col-form-label">наименование:</label>
                            <div>
                                <input type="text" name="akt_name" id="akt_name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="akt_month" class="col-form-label">за месяц:</label>
                            <div>
                                <input type="text" name="akt_month" id="akt_month" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="akt_desc" class="col-form-label">описание:</label>
                            <div>
                                <textarea rows="5" name="akt_desc" id="akt_desc" class="form-control"></textarea>
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

  @if (count($akts) > 0)
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>наименование</th>
                <th>за месяц</th>
                <th>описание</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($akts as $akt)
                <tr>
                  <td>{{ $akt->id }}</td>
                  <td>{{ $akt->akt_name }}</td>
                  <td>{{ $akt->akt_month }}</td>
                  <td>{{ $akt->akt_desc }}</td>
                  <td>
                    <form action="{{url('akt/' . $akt->id)}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                      <button type="submit" id="del-akt-{{$akt->id}}" class="btn btn-danger">
                        <i class="fa fa-btn fa-trash"></i>Удалить
                      </button>
                    </form>
                  </td>
                  <td>
                    <form action="{{url('akt/' . $akt->id . '/edit')}}" method="get">
                      {{ csrf_field() }}
                      <button type="submit" id="edit-akt-{{$akt->id}}" class="btn btn-primary">
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
