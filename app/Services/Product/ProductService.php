<?php

namespace App\Services\Product;

use App\DTO\Product\CreateProductDTO;
use App\DTO\Product\UpdateProductDTO;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductService
{
    public function index(array $params): JsonResponse
    {
        $perPage   = $params['per_page']   ?? 10;
        $sortBy    = $params['sort_by']    ?? 'id';
        $sortOrder = $params['sort_order'] ?? 'asc';

        $products = Product::orderBy($sortBy, $sortOrder)->paginate($perPage);

        return success([
            'products' => ProductResource::collection($products),
            'meta' => [
                'per_page' => $products->perPage(),
                'current_page' => $products->currentPage(),
                'total' => $products->total(),
                'last_page' => $products->lastPage(),
            ]
        ], 'Products fetched successfully');
    }

    public function store(CreateProductDTO $dto): JsonResponse
    {
        $product = Product::create([
            'name' => $dto->name,
            'price' => $dto->price,
            'stock' => $dto->stock,
            'description' => $dto->description,
        ]);

        return success(
            new ProductResource($product),
            'Product created successfully',
            201
        );
    }

    public function update(Product $product, UpdateProductDTO $dto): JsonResponse
    {
        $product->update(array_filter([
            'name' => $dto->name,
            'price' => $dto->price,
            'stock' => $dto->stock,
            'description' => $dto->description,
        ]));


        return success(
            new ProductResource($product),
            'Product updated successfully'
        );
    }

    public function show(Product $product): JsonResponse
    {
        return success(
            new ProductResource($product),
            'Product fetched successfully'
        );
    }

    public function delete(Product $product): void
    {
        $product->delete();
    }
}
