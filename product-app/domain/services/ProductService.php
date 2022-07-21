<?php

namespace domain\services;
use App\Models\Product;
use infrastructure\Facade\ImagesFacade;

class ProductService{


    protected $product;

    public function __construct(){

        $this->product = new Product();


    }

    public function all(){

        return $this->product->all();


    }

    public function addproduct(){
        return view('pages.product.add');
    }

    public function store($data){

       $image = ImagesFacade::store($data['image'],[1,2,3,4,5]);

       $data['image'] = $image['created_images']->name;

        $this->product->create($data);

    }

    public function delete($product_id)
    {
     $product = $this->product->find($product_id);
     $product->delete();

    }

    public function setactive($product_id)
    {
     $product = $this->product->find($product_id);
     $product->status='active';
     $product->update();

    }

    public function setinactive($product_id)
    {
     $product = $this->product->find($product_id);
     $product->status='inactive';
     $product->update();

    }

    public function get($product_id)
    {
     return $this->product->find($product_id);


    }

    public function update(array $data,$product_id)
    {
     $product = $this->product->find($product_id);
     $product->update($this.edit($product,$data));


    }

      protected function edit(Product $product,$data){
        return array_merge($product->toArray(),$data);
      }

}

?>
