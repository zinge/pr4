@extends('layouts.app')

@section('content')
<div class="container">
    <button class="btn btn-primary"
          role="button"
          data-toggle="collapse"
          href="#phoneAddForm"
          aria-expanded="false"
          aria-controls="phoneAddForm">
          Добавить телефон
    </button>
    <div class="collapse" id="phoneAddForm">
        <div class="well">
            <div class="panel">
                <div class="panel-heading">
                     Укажите параметры нового элемента
                </div>
                <div class="panel-body">
                    <!-- display validation errors -->
                    @include('common.errors')

                    <form action="{{ url('phone') }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="num" class="col-form-label">номер:</label>
                            <div>
                                <input type="text" name="num" id="num" class="form-control" value="{{ old('num') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="ats" id="ats" checked="true">На АТС ?
                                </label>
                              </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="macaddr" class="col-form-label">MAC адрес:</label>
                            <div>
                                <input type="text" name="macaddr" id="macaddr" class="form-control" value="{{ old('macaddr') }}">
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

  @if (count($phones) > 0)
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Номер</th>
                <th>На АТС?</th>
                <th>МАС адрес</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($phones as $phone)
                <tr>
                  <td>{{ $phone->id }}</td>
                  <td>{{ $phone->num }}</td>
                  <td><label><input type="checkbox" {{ $phone->ats==TRUE?'checked="true"':'' }}  disabled="true"></label></td>
                  <td>{{ $phone->macaddr }}</td>
                  <td>
                    <form action="{{url('phone/' . $phone->id)}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                      <button type="submit" id="del-phone-{{$phone->id}}" class="btn btn-danger">
                        <i class="fa fa-btn fa-trash"></i>Удалить
                      </button>
                    </form>
                  </td>
                  <td>
                    <form action="{{url('phone/' . $phone->id . '/edit')}}" method="get">
                      {{ csrf_field() }}
                      <button type="submit" id="edit-phone-{{$phone->id}}" class="btn btn-primary">
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
