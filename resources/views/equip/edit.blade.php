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
            <tr>
              <td>{{ $equip->id }}</td>
              <td>{{ $equip->invnumber }}</td>
              <td>{{ $equip->equipname }}</td>
              <td>{{ $equip->equipvendor }}</td>
              <td>{{ $equip->equiptype->equiptype_desc }}</td>
              <td><label><input type="checkbox" {{ $equip->owned==TRUE?'checked="true"':'' }}  disabled="true"></label></td>
              <td>{{ $equip->coworker->secname . " " . $equip->coworker->name . " (" . $equip->coworker->mvz->mvz_desc . ")"}}</td>
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
      <form action="{{ url('equip/'.$equip->id ) }}" method="post" class="form-horizontal">
        {{ method_field('put') }}
        {{ csrf_field() }}

        <div class="form-group row">
          <label for="invnumber" class="col-form-label">Инв. номер:</label>
          <div>
            <input type="text" name="invnumber" id="invnumber" class="form-control" value="{{ $equip->invnumber ? $equip->invnumber : old('invnumber') }}">
          </div>
        </div>

        <div class="form-group row">
          <label for="equipname" class="col-form-label">Наименование:</label>
          <div>
            <input type="text" name="equipname" id="equipname" class="form-control" value="{{ $equip->equipname ? $equip->equipname : old('equipname') }}">
          </div>
        </div>

        <div class="form-group row">
          <label for="equipvendor" class="col-form-label">Вендор:</label>
          <div>
            <input type="text" name="equipvendor" id="equipvendor" class="form-control" value="{{ $equip->equipvendor ? $equip->equipvendor : old('equipvendor') }}">
          </div>
        </div>

        <div class="form-group row">
          <label for="equiptype_id" class="col-form-label">Тип:</label>
          <div>
            <select multiple class="form-control" name="equiptype_id" id="equiptype_id">
              @if (count($equiptypes) > 0)
                @foreach ($equiptypes as $equiptype)
                  @if( ($equip->equiptype_id ? $equip->equiptype_id : old('equiptype_id')) == $equiptype->id)
                    <option  value="{{ $equiptype->id }}" selected="true"> {{ $equiptype->equiptype_desc }} </option>
                  @else
                    <option  value="{{ $equiptype->id }}"> {{ $equiptype->equiptype_desc }} </option>
                  @endif
                @endforeach
              @endif
            </select>
          </div>
        </div>

        <div class="form-group row">
          <div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="owned" id="owned" value="true" {{ old('owned')==TRUE?'checked="true"':'' }}>Наше ?
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
                  @if (  ($equip->coworker_id ? $equip->coworker_id : old('coworker_id')) == $coworker->id )
                    <option value="{{ $coworker->id }}" selected="true"> {{ $coworker->secname . " " . $coworker->name . " (" . $coworker->mvz->mvz_desc . ")"}} </option>
                  @else
                    <option value="{{ $coworker->id }}"> {{ $coworker->secname . " " . $coworker->name . " (" . $coworker->mvz->mvz_desc . ")"}} </option>
                  @endif
                @endforeach
              @endif
            </select>
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
