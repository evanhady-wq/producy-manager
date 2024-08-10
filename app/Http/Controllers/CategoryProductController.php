<?php

namespace App\Http\Controllers;

use App\Services\CategoryProductService;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    protected $categoryProductService;

    public function __construct(CategoryProductService $categoryProductService)
    {
        $this->categoryProductService = $categoryProductService;
    }

    public function index()
    {
        return $this->categoryProductService->getAll();
    }

    public function show($id)
    {
        return $this->categoryProductService->getById($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
        ]);

        return $this->categoryProductService->create($data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
        ]);

        return $this->categoryProductService->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->categoryProductService->delete($id);
    }
}
