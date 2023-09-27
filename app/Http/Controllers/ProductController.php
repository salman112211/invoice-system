<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Product;


class ProductController extends Controller
{
    

public function store(Request $request)
{
    // Validate the form data
    $request->validate([
        'product_name' => 'required|unique:products,product_name',
    ]);

    // Create a new product
    $newProduct = new Product();
    $newProduct->product_name = $request->input('product_name');
    $newProduct->save();

    return redirect('/creat-product');
}









// Delete a product
public function deleteProduct($id)
{
    $product = Product::find($id);

    if ($product) {
        $product->delete();
    }

    return redirect()->back()->with('success', 'Product deleted successfully.');
}


    public function getAllProducts(Request $request)
    {
        // Get the search query from the request
        $searchQuery = $request->input('search');

        // Retrieve products, order them by creation date in descending order, and filter based on the search query
        $products = Product::orderBy('created_at', 'desc')
            ->where('product_name', 'like', '%' . $searchQuery . '%')
            ->paginate(3); // Adjust the pagination value as needed.

        return view('pages.creat-product', ['products' => $products]);
    }

    // ... Other methods ...
}



