<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

class ProductsController extends Controller
{
    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function products($minPrice = null, $maxPrice = null, $category = null) {
        $response = [];
        try{
            $response['data'] = $this->getProducts($minPrice, $maxPrice, $category);
            $response['success'] = true;
        }catch(\Exception $e){
            $response['success'] = false;
            $response['data'] = [];
            $response['message'] = $e->getMessage();
        }

        return json_encode($response);
    }


    //** PRIVATE FUNCTIONS **//

    private function getProducts($minPrice, $maxPrice, $category) {
        $products = Product::all();

        $products = (!is_null($minPrice)) ? $products->where('price', '>=', $minPrice) : $products;
        $products = (!is_null($maxPrice)) ? $products->where('price', '<=', $maxPrice) : $products;
        $products = (!is_null($category)) ? $products->where('category', '>=', $category) : $products;

        return $products;
    }


    // Si tuvieramos miles de productos en la base de datos es más conveniente utilitzar la siguiente función para filtrar productos por temas de rendimiento
    /*private function getProducts($minPrice, $maxPrice, $category) {
        $products = null;

        $products = (!is_null($minPrice)) ? Product::where('price', '>=', $minPrice) : null;

        if(is_null($products) && !is_null($maxPrice)){
            $products = Product::where('price', '<=', $maxPrice);
        }
        if(!is_null($products) && !is_null($maxPrice)){
            $products = $products->where('price', '<=', $maxPrice);
        }

        if(is_null($products) && !is_null($category)){
            $products = Product::where('price', 'LIKE', $category);
        }
        if(!is_null($products) && !is_null($category)){
            $products = $products->where('price', 'LIKE', $category);
        }

        if(is_null($products)){
            return Product::all();
        }

        return $products->get();
    }*/
}
