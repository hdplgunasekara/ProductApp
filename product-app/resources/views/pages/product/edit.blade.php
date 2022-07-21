<form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data" >
    @csrf

    <div class="form-group">
      <label for="inputAddress">Product Name</label>
      <input type="text" class="form-control" id="inputAddress" name="name" value="{{ $product->name }}" placeholder="Enter Product Name" required>
    </div>
    {{-- <div class="form-group">
      <label for="inputAddress2">Product Image</label>
      <input type="file" class="form-control" id="inputAddress2" name="image" accept="image/jpg, image/jpeg, image/png" required>
    </div> --}}
    <div class="form-group">
        <label for="inputAddress2">Product Price</label>
        <input type="number" step="any" class="form-control" id="inputAddress2" value="{{ $product->price }}" name="price" placeholder="Enter Product Price" required>
      </div>


    <button type="submit" class="btn btn-primary">Update</button>
  </form>
