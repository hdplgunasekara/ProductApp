<template>
  <div>
<section style="background-color: #eee;"  >
    <div class="container py-5">
      <div class="row">

        <!-- @foreach ($products as $key => $product) -->



        <div class="col-md-12 col-lg-4 mb-4 mb-lg-0" v-for="product,itemObjKey in products" >
          <div class="card" >
            <div class="d-flex justify-content-between p-3">
              <p class="lead mb-0">{{ product.name }}</p>
              <div
                class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
                style="width: 35px; height: 35px;">
                <p class="text-white mb-0 small">{{ ++itemObjKey }}</p>
              </div>
            </div>
            <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/4.webp"
              class="card-img-top" alt="Sample image" />
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <p class="small">Status</p>


                <p v-if="product.status == 'inactive'" class="small text-danger">{{ product.status }}</p>



                <p v-else class="small text-success">{{ product.status}}</p>


              </div>

              <div class="d-flex justify-content-between mb-3">
                <h5 class="mb-0">Price</h5>
                <h5 class="text-dark mb-0">LKR - {{ product.price}}</h5>
              </div>

              <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-success">Edit</button>

                <button type="button" class="btn btn-danger">Delete</button>



                <button v-if="product.status == 'inactive'" type="button" class="btn btn-primary"> Set Active</button>



                <button v-else type="button" class="btn btn-secondary">Set Inactive</button>




              </div>
            </div>
          </div>
        </div>

        <!-- @endforeach -->

      </div>
    </div>
  </section>




  </div>
</template>

<script>

  export default {
    name: "ProductList",
    data(){
      return{
        products: [],
      }
    },
    methods:{
      getProducts(){
        this.$axios.get('api/productlist').then(response => {
        this.products = response.data;

        console.log(this.products)
        });
      },
    },
    mounted(){
   this.getProducts();
    },

}
</script>

<style>
    section{
        margin-top: 4%;

    }
    </style>



