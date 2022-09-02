@extends('Admin.home')

@section('body')
    <h4 class="text-center">New Sub Category</h4>
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
       


        <form action="{{ route('subcategory.store')}}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Sub-Category Name</label>
                <input type="text" name="subcategory_name" placeholder="category-name" @error('subcategory_name') is-invalid @enderror class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp">

                @error('subcategory_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Select Category</label>
                
                <select name="category_id" id="" class="form-control">
                    @foreach ($data as $data)
                    <option value="{{$data->id}}">{{$data->category_name}}</option>
                        
                    @endforeach
                 </select>
 
               

            </div>

            <button type="submit" class="btn btn-primary">Add Subcategory</button>
        </form>

    </div>
    <div class="w-75 m-auto my-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">Category-Name</th>
                    <th scope="col">Sub-category-Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach (  $subcategory as $item => $data)
                    <tr>
                        <th scope="row">{{ ++$item }}</th>
                        <td>{{ $data->category->category_name }}</td>
                        <td>{{ $data->subcategory_name }}</td>
                        <td>
                            <a href="" class="btn btn-sm btn-info">Edit</a>
                            {{-- {{ route('category.delete', $data->id) }} --}}
                            <a href="" class="btn btn-sm btn-danger">Delete</a>
                        </td>

                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
