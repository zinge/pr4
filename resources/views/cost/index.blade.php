@extends('layouts.app')

@section('content')
<div class="container">
    <button class="btn btn-primary"
          role="button"
          data-toggle="collapse"
          href="#costAddForm"
          aria-expanded="false"
          aria-controls="costAddForm">
          Добавить элемент договора
    </button>
    <div class="collapse" id="costAddForm">
        <div class="well">
            <div class="panel">
                <div class="panel-heading">
                     Укажите параметры нового элемента
                </div>
                <div class="panel-body">
                    <!-- display validation errors -->
                    @include('common.errors')

                    <form action="{{ url('cost') }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="agreement_id" class="col-form-label">Договор:</label>
                            <div>
                              <select multiple class="form-control" name="agreement_id" id="agreement_id">
                                @if (count($agreements) > 0)
                                  @foreach ($agreements as $agreement)
                                    <option value="{{ $agreement->id }}"> {{ $agreement->agreement_name . " (" . $agreement->agreement_vector . " " . $agreement->agreement_start . ")"}} </option>
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
                                    <option value="{{ $service->id }}">{{ $service->service_name }}</option>
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
                                    <option value="{{ $mvz->id }}">{{ $mvz->mvz_desc . " (" . $mvz->mvz_cod . ")" }}</option>
                                  @endforeach
                                @endif
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-form-label">Ф.О.:</label>
                            <div>
                                <input type="text" name="amount" id="amount" class="form-control" value="{{ old('amount') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="worth" class="col-form-label">Расценка:</label>
                            <div>
                                <input type="text" name="worth" id="worth" class="form-control" value="{{ old('worth') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total_price" class="col-form-label">Итого:</label>
                            <div>
                                <input type="text" name="total_price" id="total_price" class="form-control" value="{{ old('total_price') }}">
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

  @if (count($costs) > 0)
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Договор</th>
                <th>Сервис</th>
                <th>МВЗ</th>
                <th>Ф.О.</th>
                <th>Расценка</th>
                <th>Итого</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($costs as $cost)
                <tr>
                  <td>{{ $cost->id }}</td>
                  <td>{{ $cost->agreement->agreement_name }}</td>
                  <td>{{ $cost->service->service_name }}</td>
                  <td>{{ $cost->mvz->mvz_desc }}</td>
                  <td>{{ $cost->amount }}</td>
                  <td>{{ $cost->worth }}</td>
                  <td>{{ $cost->total_price}}</td>
                  <td>
                    <form action="{{url('cost/' . $cost->id)}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                      <button type="submit" id="del-cost-{{$cost->id}}" class="btn btn-danger">
                        <i class="fa fa-btn fa-trash"></i>Удалить
                      </button>
                    </form>
                  </td>
                  <td>
                    <form action="{{url('cost/' . $cost->id . '/edit')}}" method="get">
                      {{ csrf_field() }}
                      <button type="submit" id="edit-cost-{{$cost->id}}" class="btn btn-primary">
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
