@extends('layouts.app')

@section('content')
<div class="container">
    <button class="btn btn-primary"
          role="button"
          data-toggle="collapse"
          href="#fuplAddForm"
          aria-expanded="false"
          aria-controls="fuplAddForm">
          Добавить файл
    </button>
    <div class="collapse" id="fuplAddForm">
        <div class="well">
            <div class="panel">
                <div class="panel-heading">
                     Выберите файл на диске
                </div>
                <div class="panel-body">
                    <!-- display validation errors -->
                    @include('common.errors')

                    <form action="{{ url('fu') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="fu_item" class="col-form-label">Выберите файл</label>
                            <div>
                                <input type="file" name="fu_item" id="fu_item" class="form-control">
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

  @if (count($files) > 0)
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Оригинальное имя файла</th>
                <th>Имя файла</th>
                <th>Тип файла</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($files as $file)
                <tr>
                  <td>{{ $file->id }}</td>
                  <td>{{ $file->original_filename }}</td>
                  <td>{{ $file->file_name }}</td>
                  <td>{{ $file->mime_type }}</td>
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
