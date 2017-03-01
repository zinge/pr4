@extends('layouts.app')

@section('content')
<div class="container">
    <button class="btn btn-primary"
          role="button"
          data-toggle="collapse"
          href="#equipAddForm"
          aria-expanded="false"
          aria-controls="equipAddForm">
          Добавить новое оборудование
    </button>
    <div class="collapse" id="equipAddForm">
        <div class="well">
            <div class="panel">
                <div class="panel-heading">
                     Заполните таблицу
                </div>
                <div class="panel-body">
                    <!-- display validation errors -->
                    @include('common.errors')

                    <form action="{{ url('equip') }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group row">
                          <label for="invnumber" class="col-form-label">Инв. номер:</label>
                            <div>
                              <input type="text" name="invnumber" id="invnumber" class="form-control" value="{{ old('invnumber') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="equipname" class="col-form-label">Наименование:</label>
                            <div>
                              <input type="text" name="equipname" id="equipname" class="form-control" value="{{ old('equipname') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="equipvendor" class="col-form-label">Вендор:</label>
                            <div>
                              <input type="text" name="equipvendor" id="equipvendor" class="form-control" value="{{ old('equipvendor') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="equiptype_id" class="col-form-label">Тип:</label>
                            <div>
                              <select multiple class="form-control" name="equiptype_id" id="equiptype_id">
                                @if (count($equiptypes) > 0)
                                  @foreach ($equiptypes as $equiptype)
                                    <option  value="{{ $equiptype->id }}"> {{ $equiptype->equiptype_desc }} </option>
                                  @endforeach
                                @endif
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="owned" id="owned" checked="true">Наше ?
                                </label>
                              </div>
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="coworker_id" class="col-form-label">Сотрудники:</label>
                            <div>
                              <select multiple class="form-control" name="coworker_id" id="coworker_id">
                                @if (count($coworkers) > 0)
                                  @foreach ($coworkers as $coworker)
                                    <option value="{{ $coworker->id }}"> {{ $coworker->secname . " " . $coworker->name . " (" . $coworker->mvz->mvz_desc . ")"}} </option>
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

  @if (count($equips) > 0)
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Инв. номер</th>
                <th>Наименование</th>
                <th>Вендор</th>
                <th>Тип</th>
                <th>наше</th>
                <th>ФИО</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($equips as $equip)
                <tr>
                  <td>{{ $equip->id }}</td>
                  <td>{{ $equip->invnumber }}</td>
                  <td>{{ $equip->equipname }}</td>
                  <td>{{ $equip->equipvendor }}</td>
                  <td>{{ $equip->equiptype->equiptype_desc }}</td>
                  <td><label><input type="checkbox" {{ $equip->owned==TRUE?'checked="true"':'' }}  disabled="true"></label></td>
                  <td>{{ $equip->coworker->secname . " " . $equip->coworker->name . " (" . $equip->coworker->mvz->mvz_desc . ")"}}</td>

                  <td>
                    <form action="{{url('equip/' . $equip->id)}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                      <button type="submit" id="del-equip-{{$equip->id}}" class="btn btn-danger">
                        <i class="fa fa-btn fa-trash"></i>Удалить
                      </button>
                    </form>
                  </td>
                  <td>
                    <form action="{{url('equip/' . $equip->id . '/edit')}}" method="get">
                      {{ csrf_field() }}
                      <button type="submit" id="edit-equip-{{$equip->id}}" class="btn btn-primary">
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
