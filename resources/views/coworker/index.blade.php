@extends('layouts.app')

@section('content')
<div class="container">
    <button class="btn btn-primary"
          role="button"
          data-toggle="collapse"
          href="#coworkerAddForm"
          aria-expanded="false"
          aria-controls="coworkerAddForm">
          Добавить сотрудника
    </button>
    <div class="collapse" id="coworkerAddForm">
        <div class="well">
            <div class="panel">
                <div class="panel-heading">
                     Укажите параметры нового элемента
                </div>
                <div class="panel-body">
                    <!-- display validation errors -->
                    @include('common.errors')

                    <form action="{{ url('coworker') }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group row">
                          <label for="secname" class="col-form-label">Фамилия:</label>
                            <div>
                              <input type="text" name="secname" id="secname" class="form-control" value="{{ old('secname') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-form-label">Имя:</label>
                            <div>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="thirdname" class="col-form-label">Отчество:</label>
                            <div>
                                <input type="text" name="thirdname" id="thirdname" class="form-control" value="{{ old('thirdname') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address_id" class="col-form-label">Адрес:</label>
                            <div>
                              <select multiple class="form-control" name="address_id" id="address_id">
                                @if (count($addresses) > 0)
                                  @foreach ($addresses as $address)
                                    <option value="{{ $address->id }}"> {{ $address->streethouse . " (" . $address->city . ")"}} </option>
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
                                    <option  value="{{ $mvz->id }}"> {{ $mvz->mvz_desc . " (" . $mvz->mvz_cod . ")"}} </option>
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

  @if (count($coworkers) > 0)
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>МВЗ</th>
                <th>Адрес</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($coworkers as $coworker)
                <tr>
                  <td>{{ $coworker->id }}</td>
                  <td>{{ $coworker->secname }}</td>
                  <td>{{ $coworker->name }}</td>
                  <td>{{ $coworker->thirdname }}</td>
                  <td>{{ $coworker->mvz->mvz_desc }}</td>
                  <td>{{ $coworker->address->streethouse}}</td>
                  <td>
                    <form action="{{url('coworker/' . $coworker->id)}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                      <button type="submit" id="del-coworker-{{$coworker->id}}" class="btn btn-danger">
                        <i class="fa fa-btn fa-trash"></i>Удалить
                      </button>
                    </form>
                  </td>
                  <td>
                    <form action="{{url('coworker/' . $coworker->id . '/edit')}}" method="get">
                      {{ csrf_field() }}
                      <button type="submit" id="edit-coworker-{{$coworker->id}}" class="btn btn-primary">
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
