<?php

namespace App\DTO\Product;

use App\Http\Requests\Product\ProductUpdateRequest;

readonly class UpdateProductDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public string $name,
        public int $price,
        public int $stock,
        public ?string $description,
    ) {
        //
    }
    public static function fromRequest(ProductUpdateRequest $request): self
    {
        return new self(...$request->validated());
    }
}
