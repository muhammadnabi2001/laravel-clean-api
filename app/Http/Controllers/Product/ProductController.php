<?php

namespace App\Http\Controllers\Product;

use App\DTO\Product\CreateProductDTO;
use App\DTO\Product\UpdateProductDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductIndexRequest;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Product;
use App\Services\Product\ProductService;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(private readonly ProductService $service) {}
    
    public function index(ProductIndexRequest $request)
    {
        return  $this->service->index($request->validated());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        $dto = CreateProductDTO::fromRequest($request);
        return $this->service->store($dto);
    }

    /**
     * Display the specified resource.
     */

    public function show(Product $product)
    {
        return $this->service->show($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $dto = UpdateProductDTO::fromRequest($request);
        return $this->service->update($product, $dto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->service->delete($product);
        return success(
            null,
            'Product deleted successfully'
        );
    }
}
