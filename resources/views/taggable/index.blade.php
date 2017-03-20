@extends('layouts.app')

@section('content')
  <div class="container">
    <button class="btn btn-primary" role="button" data-toggle="collapse" href="#taggableAddForm" aria-expanded="false" aria-controls="taggableAddForm">+ taggable</button>
    <div class="collapse" id="taggableAddForm">
      <div class="well">
        <div class="panel">
          <div class="panel-heading"></div>
          <div class="panel-body">
            <!-- display validation errors -->
            @include('common.errors')

            <form action="{{ url('taggable') }}" method="post" class="form-horizontal">
              {{ csrf_field() }}

              <div class="form-group row">
                <label for="name" class="col-form-label">описание:</label>
                <div>
                  <input type="text" name="name" id="name" class="form-control">
                </div>
              </div>

              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
                <div class="panel panel-default">
                  @if (count($tags) > 0)
                    @foreach ($tags as $tag)
                      <div class="panel-heading" role="tab" id="{{$tag->name}}">
                        <h4 class="panel-title">
                          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$tag->name}}" aria-expanded="false" aria-controls="collapse{{$tag->name}}">
                            {{$tag->name}}
                          </a>
                        </h4>
                      </div>
                      <div id="collapse{{$tag->name}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading{{$tag->name}}">
                        <div class="panel-body">
                          <select multiple class="form-control" name="taggable_id" id="taggable_id">
                            @if (count($ludis) > 0)
                              @foreach ($ludis as $ludi)
                                <option value="{{ $ludi->id }}"> {{ $ludi->name }} </option>
                              @endforeach
                            @endif
                          </select>
                        </div>
                      </div>
                    @endforeach
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="tag_id" class="col-form-label">tags:</label>
                <div>
                  <select multiple class="form-control" name="tag_id" id="tag_id">
                    @if (count($tags) > 0)
                      @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                      @endforeach
                    @endif
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="taggable_id" class="col-form-label">ludis:</label>
                <div>
                  <select multiple class="form-control" name="taggable_id" id="taggable_id">
                    @if (count($ludis) > 0)
                      @foreach ($ludis as $ludi)
                        <option value="{{ $ludi->id }}"> {{ $ludi->name }} </option>
                      @endforeach
                    @endif
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="taggable_id" class="col-form-label">teles:</label>
                <div>
                  <select multiple class="form-control" name="taggable_id" id="taggable_id">
                    @if (count($teles) > 0)
                      @foreach ($teles as $tele)
                        <option value="{{ $tele->id }}"> {{ $tele->name }} </option>
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

    @if (count($taggables) > 0)
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>tag_id</th>
                  <th>taggable_id</th>
                  <th>taggable_type</th>
                  <th>nado</th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($taggables as $taggable)
                  <tr>
                    <td>{{ $taggable->id }}</td>
                    <td>{{ $taggable->tag_id }}</td>
                    <td>{{ $taggable->taggable_id }}</td>
                    <td>{{ $taggable->taggable_type }}</td>
                    <td>{{ $taggable->nado }}</td>
                    <td>
                      <form action="{{url('taggable/' . $taggable->id)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button type="submit" id="del-taggable-{{$taggable->id}}" class="btn btn-danger">
                          <i class="fa fa-btn fa-trash"></i>Удалить
                        </button>
                      </form>
                    </td>
                    <td>
                      <form action="{{url('taggable/' . $taggable->id . '/edit')}}" method="get">
                        {{ csrf_field() }}
                        <button type="submit" id="edit-taggable-{{$taggable->id}}" class="btn btn-primary">
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
