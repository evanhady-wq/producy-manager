<?php

namespace App\Services;

use App\Models\CategoryProduct;

class CategoryProductService
{
    public function getAll()
    {
        return CategoryProduct::all();
    }

    public function getById($id)
    {
        return CategoryProduct::findOrFail($id);
    }

    public function create($data)
    {
        return CategoryProduct::create($data);
    }

    public function update($id, $data)
    {
        $categoryProduct = CategoryProduct::findOrFail($id);
        $categoryProduct->update($data);

        return $categoryProduct;
    }

    public function delete($id)
    {
        $categoryProduct = CategoryProduct::findOrFail($id);
        $categoryProduct->delete();

        return $categoryProduct;
    }
}
