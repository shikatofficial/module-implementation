@extends('blog::layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-12">

        <form action="{{ route('blog.store')}}" method="post" id="addProductForm">
    @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">Add New Blog</h5>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Blog Title">
          </div>

          <div class="form-group">
            <label for="content">Content:</label>
            <input type="text" class="form-control" name="content" id="content" placeholder="Blog content">
          </div>

        </div>
        <div class="modal-footer">
        <button href="{{ route('blog.index') }}" class="btn btn-danger">Cancel</button>
          <button type="submit" class="btn btn-success ">Add Blog</button>
        </div>
      </div>
    </div>
  </form>
        </div>
    </div>
</div>
@endsection