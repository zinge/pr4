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
                <th>ФИО</th>
                <th>Номер</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $phoneowner->id }}</td>
                <td class="table-text">{{ $coworkers->find($phoneowner->coworker_id )->secname . " " . $coworkers->find($phoneowner->coworker_id)->name }}</td>
                <td class="table-text">{{ $phones->find($phoneowner->phone_id )->num }}</td>
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
        <form action="{{ url('phoneowner/'.$phoneowner->id ) }}" method="post" class="form-horizontal">
            {{ method_field('put') }}
            {{ csrf_field() }}
            <div class="form-group row">
              <label for="coworker_id" class="col-form-label">сотрудники:</label>
                <div>
                  <select multiple class="form-control" name="coworker_id" id="coworker_id">
                    @if (count($coworkers) > 0)
                      @foreach ($coworkers as $coworker)
                        @if ( ($phoneowner->coworker_id ? $phoneowner->coworker_id : old('coworker_id')) == $coworker->id )
                          <option value="{{ $coworker->id }}" selected="true"> {{ $coworker->secname . " " . $coworker->name }} </option>
                        @else
                          <option value="{{ $coworker->id }}"> {{ $coworker->secname . " " . $coworker->name }} </option>
                        @endif
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
                        @if (  ($phoneowner->phone_id ? $phoneowner->phone_id : old('phone_id')) == $phone->id )
                          <option value="{{ $phone->id }}" selected="true"> {{ $phone->num }} </option>
                        @else
                          <option value="{{ $phone->id }}"> {{ $phone->num }} </option>
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
