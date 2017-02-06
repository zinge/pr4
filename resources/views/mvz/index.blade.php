@extends('layouts.app')

@section('content')
<div class="container">
    <button class="btn btn-primary" 
          role="button"
          data-toggle="collapse" 
          href="#mvzAddForm"
          aria-expanded="false"
          aria-controls="mvzAddForm">
          Добавить МВЗ
    </button>
    <div class="collapse" id="mvzAddForm">
        <div class="well">
            <div class="panel">
                <div class="panel-heading">
                     Укажите описание и код нового элемента МВЗ
                </div>
                <div class="panel-body">
                    <form action="{{ url('mvz') }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="mvz_desc" class="col-form-label">описание:</label>
                            <div>
                                <input type="text" name="mvz_desc" id="mvz_desc" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mvz_cod" class="col-form-label">код:</label>
                            <div>
                                <input type="text" name="mvz_cod" id="mvz_cod" class="form-control">
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

  @if (count($mvzs) > 0)
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Header</th>
            <th>Header</th>
            <th>Header</th>
            <th>Header</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1,001</td>
            <td>lorem</td>
            <td>ipsum</td>
            <td>dolor</td>
            <td>sit</td>
          </tr>
          <tr>
            <td>1,001</td>
            <td>lorem</td>
            <td>ipsum</td>
            <td>dolor</td>
            <td>sit</td>
          </tr>
        </tbody>
      </table>
    </div>
  @endif
</div>
@endsection
