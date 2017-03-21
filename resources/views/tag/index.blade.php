@extends('layouts.app')

@section('content')
  <div class="container">
    <button class="btn btn-primary" role="button" data-toggle="collapse" href="#tagAddForm" aria-expanded="false" aria-controls="tagAddForm">+ tag</button>
    <div class="collapse" id="tagAddForm">
      <div class="well">
        <div class="panel">
          <div class="panel-heading">
          </div>
          <div class="panel-body">
            <!-- display validation errors -->
            @include('common.errors')

            <form action="{{ url('tag') }}" method="post" class="form-horizontal">
              {{ csrf_field() }}

              <div class="form-group row">
                <label for="name" class="col-form-label">описание:</label>
                <div>
                  <input type="text" name="name" id="name" class="form-control">
                </div>
              </div>

              <div class="form-group row">
                <div>
                  <button type="submit" class="btn btn-primary"> + + </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    @if (count($tags) > 0)
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>описание</th>
                  <th>надо</th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tags as $tag)
                  <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->nado }}</td>
                    <td>
                      <form action="{{url('tag/' . $tag->id)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button type="submit" id="del-tag-{{$tag->id}}" class="btn btn-danger">
                          <i class="fa fa-btn fa-trash"></i> - -
                        </button>
                      </form>
                    </td>
                    <td>
                      <form action="{{url('tag/' . $tag->id . '/edit')}}" method="get">
                        {{ csrf_field() }}
                        <button type="submit" id="edit-tag-{{$tag->id}}" class="btn btn-primary">
                          <i class="fa fa-btn fa-edit"></i> +/- 
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
