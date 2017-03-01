@extends('layouts.app')

@section('content')
<div class="container">
    <button class="btn btn-primary"
          role="button"
          data-toggle="collapse"
          href="#addressAddForm"
          aria-expanded="false"
          aria-controls="addressAddForm">
          Добавить адрес
    </button>
    <div class="collapse" id="addressAddForm">
        <div class="well">
            <div class="panel">
                <div class="panel-heading">
                     Укажите город и адрес нового элемента
                </div>
                <div class="panel-body">
                    <!-- display validation errors -->
                    @include('common.errors')

                    <form action="{{ url('address') }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="city" class="col-form-label">город:</label>
                            <div>
                                <input type="text" name="city" id="city" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="streethouse" class="col-form-label">улица, дом:</label>
                            <div>
                                <input type="text" name="streethouse" id="streethouse" class="form-control">
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

  @if (count($addresses) > 0)
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Описание</th>
                <th>Код</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($addresses as $address)
                <tr>
                  <td>{{ $address->id }}</td>
                  <td>{{ $address->city }}</td>
                  <td>{{ $address->streethouse }}</td>
                  <td>
                    <form action="{{url('address/' . $address->id)}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('delete') }}
                      <button type="submit" id="del-address-{{$address->id}}" class="btn btn-danger">
                        <i class="fa fa-btn fa-trash"></i>Удалить
                      </button>
                    </form>
                  </td>
                  <td>
                    <form action="{{url('address/' . $address->id . '/edit')}}" method="get">
                      {{ csrf_field() }}
                      <button type="submit" id="edit-address-{{$address->id}}" class="btn btn-primary">
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
