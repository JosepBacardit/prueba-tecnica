<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Alert;

use App\Models\Product;

class ProductsController extends Controller
{
    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function index() {
        $products = Product::all();

        return view('frontend.index')->with([
            'products' => $products
        ]);
    }

    public function store() {
        try{
            $validation = $this->validation($this->request->all());
            if($validation->fails()){
                return redirect()->back()->withErrors($validation->errors());
            }

            $this->fillProduct();

            Alert::success("El producto se ha guardado correctamente");
        }catch(\Exception $e){
            Alert::error("Error: ".$e->getMessage());
        }

        return redirect()->back();
    }

    /** PRIVATE FUNCTIONS **/
    private function validation($inputs) {
        $rules = [
            'category' => 'required|max:255',
            'name' => 'required|max:255',
            'price' => 'required|numeric',
        ];

        return Validator::make($inputs,$rules);
    }

    private function fillProduct($product = null){
        if(is_null($product)){
            $product = new Product();
        }

        $product->category = $this->request->get('category');
        $product->name = $this->request->get('name');
        $product->price = $this->request->get('price');

        $product->save();
    }
}
