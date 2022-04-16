<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\MassDestroyProductRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::with(['categories'])->get();
        return view('admin.product.index', compact('products'));
    }

    public function create(): View
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('admin.product.create', compact('categories'));
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $product = Product::create($request->validated());
        if ($product) {
            $product->categories()->sync($request->input('categories', []));
        }
        return redirect()->route('admin.product.index');
    }

    public function edit(Product $product): View
    {
        $categories = Category::all()->pluck('name', 'id');
        $product->load(['categories']);
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());
        $product->categories()->sync($request->input('categories', []));
        return redirect()->route('admin.product.index');
    }

    public function show(Product $product): View
    {
        return view('admin.product.show', compact('product'));
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request): Response
    {
        Product::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
