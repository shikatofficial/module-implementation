@extends('blog::layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-12">

        <form action="{{ route('csv.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label for="csv_file">Upload CSV File:</label>
              <input type="file" class="form-control-file" name="csv_file" id="csv_file">
          </div>

          <a href="{{ route('csv.index') }}" class="btn btn-danger">Cancel</a>
          <button type="submit" class="btn btn-success">Upload CSV</button>
      </form>

        </div>
    </div>
</div>
@endsection