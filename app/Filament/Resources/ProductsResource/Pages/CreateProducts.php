<?php

namespace App\Filament\Resources\ProductsResource\Pages;

use App\DTO\Products\ProductsDTO;
use App\Filament\Resources\ProductsResource;
use App\Models\Products;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateProducts extends CreateRecord
{
    protected static string $resource = ProductsResource::class;

    protected static ?string $title = 'Novo Produto';

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $productDTO = new ProductsDTO(
            name: $data['name'],
            description: $data['description'],
            price: $data['price'],
            status: $data['status']->value,
        );

        return $productDTO->toArray();
    }

    protected function getFormActions(): array
    {
        return [
            Actions\Action::make('save')
                ->label('Salvar')
                ->submit('save'),

            Actions\Action::make('voltar')
                ->label('Voltar')
                ->url($this->getResource()::getUrl('index'))
                ->color('gray'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return route('filament.admin.resources.products.create');
    }
}
