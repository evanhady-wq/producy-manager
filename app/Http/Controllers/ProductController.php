<?php


namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function show($id)
    {
        return $this->productService->getById($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_category_id' => 'required|exists:category_products,id',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|string',
        ]);

        return $this->productService->create($data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'product_category_id' => 'required|exists:category_products,id',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|string',
        ]);

        return $this->productService->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->productService->delete($id);
   
    }

}