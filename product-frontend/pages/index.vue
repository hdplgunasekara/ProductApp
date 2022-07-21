<template>
  <div>
     <NavBar/>
     <ProductList/>

    </div>

</template>

<script>
import NavBar from '~/components/Main/NavBar.vue';
import ProductList from '../components/ProductList.vue';
export default {
    name: "IndexPage",
    components: { NavBar, ProductList }
}
</script>
