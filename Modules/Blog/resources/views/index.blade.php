@extends('blog::layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-12">
            <h2 class="my-5">Blogs</h2>

            <a href="{{route('blog.create')}}" class="btn btn-primary my-3" >Add Blog</a>

            <!-- <input type="text" name="search" id="search" class="my-3 form-control" placeholder="Search here..."> -->
            <!-- <form id="searchForm" class="my-3 text-right">
              <input type="text" id="searchInput" name="query" placeholder="Search...">
              <button type="submit" class="btn btn-primary">Search</button> -->
          </form>

            <div class="table-data">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($blogs as $blog)
                <tr>
                      <th scope="row">{{ $blog->id }}</th>
                      <td>{{ $blog->title }}</td>
                      <td>{{ $blog->content }}</td>
                      <td class="d-flex">
                      <a href="{{ route('blog.edit', ['blog' => $blog->id]) }}" class="btn btn-info">Edit</a>

                      <form action="{{ route('blog.destroy', ['blog' => $blog->id]) }}" method="post" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger ml-2" onclick="return confirm('Are you sure you want to delete this blog post?')">Delete</button>
</form>
                      </td>
                  </tr>
              @endforeach
             
                
                </tbody>
            </table>

            </div>
        </div>
    </div>
    </div>
@endsection
