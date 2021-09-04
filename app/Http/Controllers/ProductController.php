<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
        // primero debe estar auth autenticado para poder utilizar algo del controler de product,
        // si trato de acceder a product siempre pedira inicio de sesión
    function __construct()
    {
        $this->middleware('auth');
    }

    //hacer método
    function show(){
        $list = product::all(); // es equivalente al select * from products
        return view('products/list',['miLista' => $list]);
    }

    function form($id = null){

        $product = new Product();
        $brands = Brand::all();
        $categories = Category::all();

        if($id != null){
            $product = Product::findOrFail($id);
        } 
        return view('products/form',[
            'product' => $product,
            'brands' => $brands,
            'categories' => $categories
        ]);
    }

    // importancia y difenrencia del "=>,se usa pára arreglos ""->, cuando queremos acceder a algo dentro de un objeto"
    function save(Request $request){
        //realizamos validación
        $request->validate([
            "name"=>'required|max:50',
            "cost"=>'required|numeric',
            "price"=>'required|numeric',
            "quantity"=>'required|numeric',
            "brand"=>'required|max:50',
            "category"=>'required|max:100'
        ]);
    
        //estamos realizando una inserción basica
        $product = new Product();
        if($request->id > 0){
            $product = Product::findOrFail($request->id);
        }
        $product->name = $request->name;
        $product->cost = $request->cost;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->brand_id = $request->brand;
        $product->category_id = $request->category;


        $product->save();

        return redirect('/products')->with('message','Producto guardado');
    }

    function delete($id){
        //select * from products where id=$id;
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products')->with('delete','Producto eliminado');
    }
}
