@extends('blog::layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-12">

        <form action="{{ route('blog.update', $blog->id) }}" method="post" id="editBlogForm">
            @csrf
            @method('PUT') {{-- Use the PUT method for updating --}}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Blog</h5>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Blog Title" value="{{ $blog->title }}">
                        </div>

                        <div class="form-group">
                            <label for="content">Content:</label>
                            <input type="text" class="form-control" name="content" id="content" placeholder="Blog content" value="{{ $blog->content }}">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('blog.index') }}" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-success">Update Blog</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
