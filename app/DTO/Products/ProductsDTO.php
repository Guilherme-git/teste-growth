<?php

namespace App\DTO\Products;

class ProductsDTO
{
    public function __construct(
        public string $name,
        public float $price,
        public string $description,
        public string $status
    ){}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'status' => $this->status,
        ];
    }
}
