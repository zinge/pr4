@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>МВЗ</th>
                <th>Адрес</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $coworker->thirdname }}</td>
                <td>{{ $coworker->name }}</td>
                <td>{{ $coworker->secname }}</td>
                <td>{{ $coworker->find($coworker->id)->mvz->mvz_desc }}</td>
                <td>{{ $coworker->find($coworker->id)->address->streethouse}}</td>
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
        <form action="{{ url('coworker/'.$coworker->id ) }}" method="post" class="form-horizontal">
            {{ method_field('put') }}
            {{ csrf_field() }}

            <div class="form-group row">
              <label for="secname" class="col-form-label">Фамилия:</label>
                <div>
                  <input type="text" name="secname" id="secname" class="form-control" value="{{ $coworker->secname ? $coworker->secname : old('secname') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-form-label">Имя:</label>
                <div>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $coworker->name ? $coworker->name : old('name') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="thirdname" class="col-form-label">Отчество:</label>
                <div>
                    <input type="text" name="thirdname" id="thirdname" class="form-control" value="{{ $coworker->thirdname ? $coworker->thirdname : old('thirdname') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="address_id" class="col-form-label">Адрес:</label>
                <div>
                  <select multiple class="form-control" name="address_id" id="address_id">
                    @if (count($addresses) > 0)
                      @foreach ($addresses as $address)
                        @if (  ($coworker->address_id ? $coworker->address_id : old('address_id')) == $address->id )
                          <option value="{{ $address->id }}" selected="true"> {{ $address->streethouse . " (" . $address->city . ")"}} </option>
                        @else
                          <option value="{{ $address->id }}"> {{ $address->streethouse . " (" . $address->city . ")"}} </option>
                        @endif
                      @endforeach
                    @endif
                  </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="mvz_id" class="col-form-label">МВЗ:</label>
                <div>
                  <select multiple class="form-control" name="mvz_id" id="mvz_id">
                    @if (count($mvzs) > 0)
                      @foreach ($mvzs as $mvz)
                        @if (  (trim($coworker->mvz_id ? $coworker->mvz_id : old('mvz_id'))) == $mvz->id )
                          <option  value="{{ $mvz->id }}" selected="true"> {{ $mvz->mvz_desc . " (" . $mvz->mvz_cod . ")"}} </option>
                        @else
                          <option  value="{{ $mvz->id }}"> {{ $mvz->mvz_desc . " (" . $mvz->mvz_cod . ")"}} </option>
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
