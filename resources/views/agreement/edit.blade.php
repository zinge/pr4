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
                <th>действует с</th>
                <th>направление</th>
                <th>описание</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $agreement->agreement_name }}</td>
                <td>{{ $agreement->agreement_start }}</td>
                <td>{{ $agreement->agreement_vector }}</td>
                <td>{{ $agreement->agreement_desc }}</td>
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
        <form action="{{ url('agreement/'.$agreement->id ) }}" method="post" class="form-horizontal">
            {{ method_field('put') }}
            {{ csrf_field() }}

            <div class="form-group row">
              <label for="agreement_name" class="col-form-label">наименование:</label>
                <div>
                  <input type="text" name="agreement_name" id="agreement_name" class="form-control" value="{{ $agreement->agreement_name ? $agreement->agreement_name : old('agreement_name') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="agreement_start" class="col-form-label">действует с:</label>
                <div>
                    <input type="text" name="agreement_start" id="agreement_start" class="form-control" value="{{ $agreement->agreement_start ? $agreement->agreement_start : old('agreement_start') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="agreement_vector" class="col-form-label">направление деятельности:</label>
                <div>
                    <input type="text" name="agreement_vector" id="agreement_vector" class="form-control" value="{{ $agreement->agreement_vector ? $agreement->agreement_vector : old('agreement_vector') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="agreement_desc" class="col-form-label">описание:</label>
                <div>
                  <textarea rows="5" name="agreement_desc" id="agreement_desc" class="form-control">{{ $agreement->agreement_desc ? $agreement->agreement_desc : old('agreement_desc') }}</textarea>
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
