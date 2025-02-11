<?php

namespace App\Filament\Resources\ProductsResource\Pages;

use App\DTO\Products\ProductsDTO;
use App\Filament\Resources\ProductsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProducts extends EditRecord
{
    protected static string $resource = ProductsResource::class;

    protected static ?string $title = 'Editar Produto';

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $productDTO = new ProductsDTO(
            name: $data['name'],
            description: $data['description'],
            price: $data['price'],
            status: $data['status']
        );

        $this->record->update($productDTO->toArray());
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

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
