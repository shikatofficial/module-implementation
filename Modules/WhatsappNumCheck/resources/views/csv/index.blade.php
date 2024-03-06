@extends('blog::layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-12">
            <h2 class="my-5">WhatsApp CSV Data</h2>

            <a href="{{route('csv.create')}}" class="btn btn-primary my-3" >Add CSV</a>
            <a href="{{route('csv.checkWhatsApp')}}" class="btn btn-success my-3" >Check WhatsApp</a>

          </form>

            <div class="table-data">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($datas as $data)
                <tr>
                      <th scope="row">{{ $data->id }}</th>
                      <td>{{ $data->name }}</td>
                      <td>{{ $data->phone }}</td>
                      <td class="d-flex">
                      <!-- <a href="{{ route('csv.edit', ['csv' => $data->id]) }}" class="btn btn-info">Edit</a> -->

                      <form action="{{ route('csv.destroy', ['csv' => $data->id]) }}" method="post" class="d-inline">
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
