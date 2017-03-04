@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Договор</th>
                <th>Сервис</th>
                <th>МВЗ</th>
                <th>Ф.О.</th>
                <th>Расценка</th>
                <th>Итого</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>{{ $cost->agreement->agreement_name }}</td>
                <td>{{ $cost->service->service_name }}</td>
                <td>{{ $cost->mvz->mvz_desc }}</td>
                <td>{{ $cost->amount }}</td>
                <td>{{ $cost->worth }}</td>
                <td>{{ $cost->total_price}}</td>
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

        <form action="{{ url('cost/'.$cost->id ) }}" method="post" class="form-horizontal">
          {{ method_field('put') }}
          {{ csrf_field() }}

          <div class="form-group row">
            <label for="agreement_id" class="col-form-label">Договор:</label>
            <div>
              <select multiple class="form-control" name="agreement_id" id="agreement_id">
                @if (count($agreements) > 0)
                  @foreach ($agreements as $agreement)
                    @if ( ($cost->agreement_id ? $cost->agreement_id : old('agreement_id')) == $agreement->id )
                      <option value="{{ $agreement->id }}" selected="true"> {{ $agreement->agreement_name . " (" . $agreement->agreement_vector . " " . $agreement->agreement_start . ")"}} </option>
                    @else
                      <option value="{{ $agreement->id }}"> {{ $agreement->agreement_name . " (" . $agreement->agreement_vector . " " . $agreement->agreement_start . ")"}} </option>
                    @endif
                  @endforeach
                @endif
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="service_id" class="col-form-label">Сервис:</label>
            <div>
              <select multiple class="form-control" name="service_id" id="service_id">
                @if (count($services) > 0)
                  @foreach ($services as $service)
                    @if ( ($cost->service_id ? $cost->service_id : old('service_id')) == $service->id )
                      <option value="{{ $service->id }}" selected="true">{{ $service->service_name }}</option>
                    @else
                      <option value="{{ $service->id }}">{{ $service->service_name }}</option>
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
                    @if ( ($cost->mvz_id ? $cost->mvz_id : old('mvz_id')) == $mvz->id )
                      <option value="{{ $mvz->id }}" selected="true">{{ $mvz->mvz_desc . " (" . $mvz->mvz_cod . ")" }}</option>
                    @else
                      <option value="{{ $mvz->id }}">{{ $mvz->mvz_desc . " (" . $mvz->mvz_cod . ")" }}</option>
                    @endif
                  @endforeach
                @endif
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="amount" class="col-form-label">Ф.О.:</label>
            <div>
              <input type="text" name="amount" id="amount" class="form-control" value="{{ $cost->amount ? $cost->amount : old('amount') }}">
            </div>
          </div>

          <div class="form-group row">
            <label for="worth" class="col-form-label">Расценка:</label>
            <div>
              <input type="text" name="worth" id="worth" class="form-control" value="{{ $cost->worth ? $cost->worth : old('worth') }}">
            </div>
          </div>

          <div class="form-group row">
            <label for="total_price" class="col-form-label">Итого:</label>
            <div>
              <input type="text" name="total_price" id="total_price" class="form-control" value="{{ $cost->total_price ? $cost->total_price : old('total_price') }}">
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
