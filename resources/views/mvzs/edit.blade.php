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
                <th>Описание</th>
                <th>Код</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $mvz->id }}</td>
                <td>{{ $mvz->mvz_desc }}</td>
                <td>{{ $mvz->mvz_cod }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
