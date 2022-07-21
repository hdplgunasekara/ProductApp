@extends('layouts.app')

@section('content')


<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf

    <div class="form-group">
      <label for="inputAddress">Product Name</label>
      <input type="text" class="form-control" id="inputAddress" name="name" placeholder="Enter Product Name" required>
    </div>
    <div class="form-group">
      <label for="inputAddress2">Product Image</label>
      <input type="file" class="form-control" id="inputAddress2" name="image" accept="image/jpg, image/jpeg, image/png" required>
    </div>
    <div class="form-group">
        <label for="inputAddress2">Product Price</label>
        <input type="number" step="any" class="form-control" id="inputAddress2" name="price" placeholder="Enter Product Price" required>
      </div>


    <button type="submit" class="btn btn-primary">ADD</button>
  </form>


@endsection


@push('css')
<style>
    form{
        margin-top: 1%;
        width: 50%;
        padding: 5%;
    }

    .btn-primary{
        margin-top: 10px;
    }
    </style>

@endpush
