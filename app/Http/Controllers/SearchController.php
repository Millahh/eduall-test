<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function products(){
        $products = Product::paginate(5);
        return view('index', compact('products'));
    }  
    public function search(Request $request){

            $columns = ['brand', 'model', 'screen_size', 'color', 'harddisk', 'cpu', 'ram', 'OS', 'special_features', 'graphics', 'graphics_coprocessor', 'cpu_speed', 'rating', 'price'];

            $search_product = Product::query();
            if ($request->has('search') && $request->search !== '') {
                foreach ($columns as $column) {
                    $search_product->orWhere($column, 'ILIKE', "%{$request->search}%");
                }

            } 
            $products = $search_product->paginate(5);

            if($products->count() > 0){
                return view('pagination', compact('products'))->render();
            }else{
                return response()->json([
                    'status' => 'nothing_found',
                    'message' => 'No products found matching your search criteria.',
                ]);
            }
    
    }

    public function pagination(Request $request){
        $search_product = Product::query();

        // Ambil search query dari request
        if ($request->has('search') && $request->search !== '') {
            $columns = ['brand', 'model', 'screen_size', 'color', 'harddisk', 'cpu', 'ram', 'OS', 'special_features', 'graphics', 'graphics_coprocessor', 'cpu_speed', 'rating', 'price'];
    
            foreach ($columns as $column) {
                $search_product->orWhere($column, 'ILIKE', "%{$request->search}%");
            }
        }
    
        $products = $search_product->paginate(5);
    
        return view('pagination', compact('products'))->render(); // Return the partial view
    }
}
