<?php

namespace App\DTO\Product;

use App\Http\Requests\Product\ProductStoreRequest;

readonly class CreateProductDTO
{
    public function __construct(
        public string $name,
        public float $price,
        public int $stock,
        public ?string $description = null
    ) {}

    public static function fromRequest(ProductStoreRequest $request): self
    {
        return new self(...$request->validated());
    }
}
