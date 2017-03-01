@extends('layouts.app')

@section('content')
<div class="container">
    <button class="btn btn-primary"
          role="button"
          data-toggle="collapse"
          href="#userAddForm"
          aria-expanded="false"
          aria-controls="userAddForm">
          Добавить права
    </button>
    <div class="collapse" id="userAddForm">
        <div class="well">
            <div class="panel">
                <div class="panel-heading">
                     Новые полномочия
                </div>
                <div class="panel-body">
                    <!-- display validation errors -->
                    @include('common.errors')

                    <form action="{{ url('rolemember') }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="rolemember-user_id" class="col-form-label">пользователи:</label>
                            <div>
                              <select multiple class="form-control" name="user_id" id="rolemember-user_id">
                                @if (count($users) > 0)
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"> {{ $user->name . " (" . $user->email . ")"}} </option>
                                    @endforeach
                                @endif
                              </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rolemember-role_id" class="col-form-label">роли:</label>
                            <div>
                              <select multiple class="form-control" name="role_id" id="rolemember-role_id">
                                @if (count($roles) > 0)
                                    @foreach ($roles as $role)
                                        <option  value="{{ $role->id }}"> {{ $role->role_name . " (" . $role->role_desc . ")"}} </option>
                                    @endforeach
                                @endif
                              </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div>
                                <button type="submit" class="btn btn-primary">
                                  <i class="fa fa-btn fa-plus"></i>Добавить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

  @if (count($rolemembers) > 0)
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Пользователи</th>
                <th>Роли</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($rolemembers as $rolemember)
                <tr>
                  <td>{{ $rolemember->id }}</td>
                  <td>{{ $rolemember->user->name }}</td>
                  <td>{{ $rolemember->role->role_name }}</td>
                  <td>
                    <form action="{{url('rolemember/' . $rolemember->id)}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                      <button type="submit" id="del-rolemember-{{$rolemember->id}}" class="btn btn-danger">
                        <i class="fa fa-btn fa-trash"></i>Удалить
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
