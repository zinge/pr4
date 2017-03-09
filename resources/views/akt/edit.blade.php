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
                <th>за месяц</th>
                <th>описание</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $akt->akt_name }}</td>
                <td>{{ $akt->akt_month }}</td>
                <td>{{ $akt->akt_desc }}</td>
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
        <form action="{{ url('akt/'.$akt->id ) }}" method="post" class="form-horizontal">
            {{ method_field('put') }}
            {{ csrf_field() }}

            <div class="form-group row">
              <label for="akt_name" class="col-form-label">наименование:</label>
                <div>
                  <input type="text" name="akt_name" id="akt_name" class="form-control" value="{{ $akt->akt_name ? $akt->akt_name : old('akt_name') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="akt_month" class="col-form-label">за месяц:</label>
                <div>
                    <input type="text" name="akt_month" id="akt_month" class="form-control" value="{{ $akt->akt_month ? $akt->akt_month : old('akt_month') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="akt_desc" class="col-form-label">описание:</label>
                <div>
                  <textarea rows="5" name="akt_desc" id="akt_desc" class="form-control">{{ $akt->akt_desc ? $akt->akt_desc : old('akt_desc') }}</textarea>
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
