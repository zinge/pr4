@extends('layouts.app')

@section('content')
<div class="container">
    <button class="btn btn-primary"
          role="button"
          data-toggle="collapse"
          href="#phoneownerAddForm"
          aria-expanded="false"
          aria-controls="phoneownerAddForm">
          Назначить владельца номера
    </button>
    <div class="collapse" id="phoneownerAddForm">
        <div class="well">
            <div class="panel">
                <div class="panel-heading">
                     Выберите владельца для номера
                </div>
                <div class="panel-body">
                    <!-- display validation errors -->
                    @include('common.errors')

                    <form action="{{ url('phoneowner') }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group row">
                          <label for="coworker_id" class="col-form-label">сотрудники:</label>
                            <div>
                              <select multiple class="form-control" name="coworker_id" id="coworker_id">
                                @if (count($coworkers) > 0)
                                  @foreach ($coworkers as $coworker)
                                    <option value="{{ $coworker->id }}"> {{ $coworker->secname . " " . $coworker->name }} </option>
                                  @endforeach
                                @endif
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="phone_id" class="col-form-label">номера:</label>
                            <div>
                              <select multiple class="form-control" name="phone_id" id="phone_id">
                                @if (count($phones) > 0)
                                  @foreach ($phones as $phone)
                                    <option  value="{{ $phone->id }}"> {{ $phone->num }} </option>
                                  @endforeach
                                @endif
                              </select>
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

  @if (count($phoneowners) > 0)
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>ФИО</th>
                <th>Номер</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($phoneowners as $phoneowner)
                <tr>
                  <td>{{ $phoneowner->id }}</td>
                  <td>{{ $phoneowner->coworker->secname . " " . $phoneowner->coworker->name }}</td>
                  <td>{{ $phoneowner->phone->num }}</td>
                  <td>
                    <form action="{{url('phoneowner/' . $phoneowner->id)}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                      <button type="submit" id="del-phoneowner-{{$phoneowner->id}}" class="btn btn-danger">
                        <i class="fa fa-btn fa-trash"></i>Удалить
                      </button>
                    </form>
                  </td>
                  <td>
                    <form action="{{url('phoneowner/' . $phoneowner->id . '/edit')}}" method="get">
                      {{ csrf_field() }}
                      <button type="submit" id="edit-phoneowner-{{$phoneowner->id}}" class="btn btn-primary">
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
