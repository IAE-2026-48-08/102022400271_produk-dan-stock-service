<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class ProductController extends Controller
{
    #[OA\Get(
        path: '/api/v1/products',
        summary: 'Get all products',
        tags: ['Products'],
        security: [['iaeKey' => []]]
    )]
    #[OA\Response(
        response: 200,
        description: 'Success'
    )]
    public function index()
    {
        return response()->json(Product::all());
    }

    #[OA\Get(
        path: '/api/v1/products/{id}',
        summary: 'Get product by ID',
        tags: ['Products'],
        security: [['iaeKey' => []]]
    )]
    #[OA\Parameter(
        name: 'id',
        in: 'path',
        required: true,
        description: 'Product ID'
    )]
    #[OA\Response(
        response: 200,
        description: 'Success'
    )]
    public function show($id)
    {
        return response()->json(Product::findOrFail($id));
    }

    #[OA\Get(
        path: '/api/v1/products/{id}/stock',
        summary: 'Get product stock',
        tags: ['Products'],
        security: [['iaeKey' => []]]
    )]
    #[OA\Parameter(
        name: 'id',
        in: 'path',
        required: true,
        description: 'Product ID'
    )]
    #[OA\Response(
        response: 200,
        description: 'Success'
    )]
    public function stock($id)
    {
        $product = Product::findOrFail($id);

        return response()->json([
            'product_id' => $product->id,
            'stock' => $product->stock
        ]);
    }

    #[OA\Post(
        path: '/api/v1/products/check-stock',
        summary: 'Check stock availability',
        tags: ['Products'],
        security: [['iaeKey' => []]]
    )]
    #[OA\RequestBody(required: true)]
    #[OA\Response(
        response: 200,
        description: 'Success'
    )]
    public function checkStock(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        return response()->json([
            'available' => $product->stock >= $request->quantity,
            'stock' => $product->stock
        ]);
    }
}