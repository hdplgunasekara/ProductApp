@extends('layouts.app')

@section('content')


<section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row">

        @if (session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
        </div>

       @endif


        @foreach ($products as $key => $product)



        <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
          <div class="card">
            <div class="d-flex justify-content-between p-3">
              <p class="lead mb-0">{{ $product->name }}</p>
              <div
                class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                style="width: 35px; height: 35px;">
                <p class="text-white mb-0 small">{{ ++$key}}</p>
              </div>
            </div>
            <img src="{{ config('images.access_path') }}/thumb/960x960/{{ $product->image }}"
              class="card-img-top" alt="Product image"   height="300px"/>
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <p class="small">Status</p>
                @if ($product->status=='inactive')

                <p class="small text-danger">{{ $product->status}}</p>

                @else

                <p class="small text-success">{{ $product->status}}</p>

                @endif

              </div>

              <div class="d-flex justify-content-between mb-3">
                <h5 class="mb-0">Price</h5>
                <h5 class="text-dark mb-0">LKR - {{ $product->price }}</h5>
              </div>

              <div class="d-flex justify-content-between">
                <a href="javascript:void(0)" onclick="editProduct({{ $product->id }})">

                <button type="button" class="btn btn-success">Edit</button>
            </a>
                <a href="{{ route('product.delete',$product->id) }}">
                <button type="button" class="btn btn-danger show_confirm">Delete</button>
                </a>
                @if ($product->status=='inactive')
                <a href="{{ route('product.setactive',$product->id) }}">
                <button type="button" class="btn btn-primary"> Set Active</button>
                </a>
                @else
                <a href="{{ route('product.setinactive',$product->id) }}">
                <button type="button" class="btn btn-secondary">Set Inactive</button>
                </a>
                @endif


              </div>
            </div>
          </div>
        </div>

        @endforeach

      </div>
    </div>
  </section>


  <!-- Modal -->
<div class="modal fade" id="productedit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="producteditLabel">Edit Product Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="producteditcontent">
          ...
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div> --}}
      </div>
    </div>
  </div>



@endsection

@push('css')
<style>
    section{
        margin-top: 2%;

    }

    .card{

        margin-top: 2%;

    }
    </style>





@endpush


@push('js')
<script>

function editProduct(product_id){
    var data = {
        product_id: product_id,

    };
    $.ajax({
        url: "{{ route('product.edit') }}",
        headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'GET',
        dataType: '',
        data: data,
        success: function(response){
            $('#productedit').modal('show');
            $('#producteditcontent').html(response);
        }
    })
}

</script>

@endpush
