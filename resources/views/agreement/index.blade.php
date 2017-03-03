@extends('layouts.app')

@section('content')
<div class="container">
    <button class="btn btn-primary"
          role="button"
          data-toggle="collapse"
          href="#agreementAddForm"
          aria-expanded="false"
          aria-controls="agreementAddForm">
          Добавить договор
    </button>
    <div class="collapse" id="agreementAddForm">
        <div class="well">
            <div class="panel">
                <div class="panel-heading">
                     Укажите описание нового договора
                </div>
                <div class="panel-body">
                    <!-- display validation errors -->
                    @include('common.errors')

                    <form action="{{ url('agreement') }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="agreement_name" class="col-form-label">наименование:</label>
                            <div>
                                <input type="text" name="agreement_name" id="agreement_name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="agreement_start" class="col-form-label">действует с:</label>
                            <div>
                                <input type="text" name="agreement_start" id="agreement_start" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="agreement_vector" class="col-form-label">направление деятельности:</label>
                            <div>
                                <input type="text" name="agreement_vector" id="agreement_vector" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="agreement_desc" class="col-form-label">описание:</label>
                            <div>
                                <textarea rows="5" name="agreement_desc" id="agreement_desc" class="form-control"></textarea>
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

  @if (count($agreements) > 0)
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>наименование</th>
                <th>действует с</th>
                <th>направление</th>
                <th>описание</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($agreements as $agreement)
                <tr>
                  <td>{{ $agreement->id }}</td>
                  <td>{{ $agreement->agreement_name }}</td>
                  <td>{{ $agreement->agreement_start }}</td>
                  <td>{{ $agreement->agreement_vector }}</td>
                  <td>{{ $agreement->agreement_desc }}</td>
                  <td>
                    <form action="{{url('agreement/' . $agreement->id)}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                      <button type="submit" id="del-agreement-{{$agreement->id}}" class="btn btn-danger">
                        <i class="fa fa-btn fa-trash"></i>Удалить
                      </button>
                    </form>
                  </td>
                  <td>
                    <form action="{{url('agreement/' . $agreement->id . '/edit')}}" method="get">
                      {{ csrf_field() }}
                      <button type="submit" id="edit-agreement-{{$agreement->id}}" class="btn btn-primary">
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
