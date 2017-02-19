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
                <th>Номер</th>
                <th>На АТС?</th>
                <th>МАС адрес</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $phone->id }}</td>
                <td>{{ $phone->num }}</td>
                <td><label><input type="checkbox" {{ $phone->ats==TRUE?'checked="true"':'' }}  disabled="true"></label></td>
                <td>{{ $phone->macaddr }}</td>
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
        <form action="{{ url('phone/'.$phone->id ) }}" method="post" class="form-horizontal">
            {{ method_field('put') }}
            {{ csrf_field() }}

            <div class="form-group row">
                <label for="num" class="col-form-label">номер:</label>
                <div>
                    <input type="text" name="num" id="num" class="form-control" value="{{ $phone->num ? $phone->num : old('num') }}">
                </div>
            </div>

            <div class="form-group row">
                <div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="ats" id="ats" value="true" {{ old('ats')==TRUE?'checked="true"':'' }} >На АТС ?
                    </label>
                  </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="macaddr" class="col-form-label">код:</label>
                <div>
                    <input type="text" name="macaddr" id="macaddr" class="form-control" value="{{ $phone->macaddr ? $phone->macaddr : old('macaddr') }}">
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
