<?php

namespace App\Filament\Resources\ProductsResource\Pages;

use App\Filament\Resources\ProductsResource;
use App\Models\Products;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use Livewire\Livewire;
use Illuminate\Contracts\View\View;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductsResource::class;

    protected static ?string $title = 'Lista de Produtos';

    public function getActions(): array
    {
        return [
            Actions\Action::make('create')
                ->label('Criar Produto')
                ->url(route('filament.admin.resources.products.create'))
                ->icon('heroicon-o-plus'),
        ];
    }
}
