@extends('layouts.app')

@section('content')
<div class="container">
    <button class="btn btn-primary"
          role="button"
          data-toggle="collapse"
          href="#roleAddForm"
          aria-expanded="false"
          aria-controls="roleAddForm">
          Добавить Роль
    </button>
    <div class="collapse" id="roleAddForm">
        <div class="well">
            <div class="panel">
                <div class="panel-heading">
                     Укажите описание и код нового элемента Роль
                </div>
                <div class="panel-body">
                    <!-- display validation errors -->
                    @include('common.errors')

                    <form action="{{ url('role') }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="role_desc" class="col-form-label">описание:</label>
                            <div>
                                <input type="text" name="role_desc" id="role_desc" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role_name" class="col-form-label">наименование:</label>
                            <div>
                                <input type="text" name="role_name" id="role_name" class="form-control">
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

  @if (count($roles) > 0)
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>описание</th>
                <th>наименование</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($roles as $role)
                <tr>
                  <td>{{ $role->id }}</td>
                  <td>{{ $role->role_desc }}</td>
                  <td>{{ $role->role_name }}</td>
                  <td>
                    <form action="{{url('role/' . $role->id)}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                      <button type="submit" id="del-role-{{$role->id}}" class="btn btn-danger">
                        <i class="fa fa-btn fa-trash"></i>Удалить
                      </button>
                    </form>
                  </td>
                  <td>
                    <form action="{{url('role/' . $role->id . '/edit')}}" method="get">
                      {{ csrf_field() }}
                      <button type="submit" id="edit-role-{{$role->id}}" class="btn btn-primary">
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
