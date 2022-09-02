@extends('Admin.home')

@section('body')
    <h4 class="text-center">New Category</h4>
    <div class="w-25 m-auto">

        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
       
            
        @endif
        @if (session('status'))
        <div class="alert alert-danger" role="alert">
            {{ session('status') }}
        </div>
   
        
    @endif
       


        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Category Name</label>
                <input type="text" name="category_name" @error('category_name') is-invalid @enderror class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp">

                @error('category_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <button type="submit" class="btn btn-primary">Add</button>
        </form>

    </div>
    <div class="w-75 m-auto my-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">Category-Name</th>
                    <th scope="col">category_slug</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item => $data)
                    <tr>
                        <th scope="row">{{ ++$item }}</th>
                        <td>{{ $data->category_name }}</td>
                        <td>{{ $data->category_slug }}</td>
                        <td>
                            <a href="" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{ route('category.delete', $data->id) }}" class="btn btn-sm btn-danger">Delete</a>
                        </td>

                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
