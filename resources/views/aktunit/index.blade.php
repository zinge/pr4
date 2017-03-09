@extends('layouts.app')

@section('content')
<div class="container">
  <button class="btn btn-primary"
  role="button"
  data-toggle="collapse"
  href="#aktunitAddForm"
  aria-expanded="false"
  aria-controls="aktunitAddForm">
  Добавить элемент акта
</button>
<div class="collapse" id="aktunitAddForm">
  <div class="well">
    <div class="panel">
      <div class="panel-heading">
        Укажите параметры нового элемента
      </div>

      <div class="panel-body">
        <!-- display validation errors -->
        @include('common.errors')

        <form action="{{ url('aktunit') }}" method="post" class="form-horizontal">
          {{ csrf_field() }}

          <div class="form-group row">
            <label for="akt_id" class="col-form-label">Акт:</label>
            <div>
              <select multiple class="form-control" name="akt_id" id="akt_id">
                @if (count($akts) > 0)
                  @foreach ($akts as $akt)
                    <option value="{{ $akt->id }}">{{ $akt->akt_name }}</option>
                  @endforeach
                @endif
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="cost_id" class="col-form-label">Услуга:</label>
            <div>
              <select multiple class="form-control" name="cost_id" id="cost_id">
                @if (count($costs) > 0)
                  @foreach ($costs as $cost)
                    <option value="{{ $cost->id }}"> {{ $cost->service->service_name }} </option>
                  @endforeach
                @endif
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="aktunit_amount" class="col-form-label">Ф.О.:</label>
            <div>
              <input type="text" name="aktunit_amount" id="aktunit_amount" class="form-control" value="{{ old('aktunit_amount') }}">
            </div>
          </div>

          <div class="form-group row">
            <label for="aktunit_total_price" class="col-form-label">Итого:</label>
            <div>
              <input type="text" name="aktunit_total_price" id="aktunit_total_price" class="form-control" value="{{ old('aktunit_total_price') }}">
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

@if (count($aktunits) > 0)
<div class="panel panel-default">
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Акт</th>
            <th>Услуга</th>
            <th>МВЗ</th>
            <th>Ф.О.</th>
            <th>Итого</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($aktunits as $aktunit)
          <tr>
            <td>{{ $aktunit->id }}</td>
            <td>{{ $aktunit->akt->akt_name}}</td>
            <td>{{ $aktunit->cost->service->service_name }}</td>
            <td>{{ $aktunit->cost->mvz->mvz_desc }}</td>
            <td>{{ $aktunit->aktunit_amount }}</td>
            <td>{{ $aktunit->aktunit_total_price}}</td>
            <td>
              <form action="{{url('aktunit/' . $aktunit->id)}}" method="post">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <button type="submit" id="del-aktunit-{{$aktunit->id}}" class="btn btn-danger">
                  <i class="fa fa-btn fa-trash"></i>Удалить
                </button>
              </form>
            </td>
            <td>
              <form action="{{url('aktunit/' . $aktunit->id . '/edit')}}" method="get">
                {{ csrf_field() }}
                <button type="submit" id="edit-aktunit-{{$aktunit->id}}" class="btn btn-primary">
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
