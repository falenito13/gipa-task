<?php

namespace App\Http\Controllers\Api\V1;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

class ApiController extends Controller
{

    public function search($query): Response
    {
        $products = $this->searchByName(Product::with(['categories']), $query);
        $categories = $this->searchByName(Category::with(['products']), $query);
        return response([Product::SINGULAR_NAME => $products,
            Category::SINGULAR_NAME => $categories], 200);
    }

    public function searchByName($model, $query)
    {
        return $model->select('id','name')->where('name', 'like', '%' . $query . '%')->get();
    }

}
