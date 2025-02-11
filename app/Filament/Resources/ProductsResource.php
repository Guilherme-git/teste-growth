<?php

namespace App\Filament\Resources;

use App\Enum\ProductsEnum;
use App\Filament\Resources\ProductsResource\Pages;
use App\Filament\Resources\ProductsResource\RelationManagers;
use App\Http\Requests\ProductRequest;
use App\Models\Products;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductsResource extends Resource
{
    protected static ?string $model = Products::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Produtos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Nome')
                    ->rule(['required', 'max:255']),

                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(255)
                    ->label('Descrição')
                    ->rule(['required', 'max:255']),

                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->label('Valor')
                    ->rule(['required', 'min:0.01']),

                Forms\Components\Select::make('status')
                    ->options(ProductsEnum::class)
                    ->default(ProductsEnum::ACTIVE)
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('description'),

                Tables\Columns\TextColumn::make('price')
                    ->numeric(),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make()
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Editar')
                    ->visible(fn ($record) => !$record->trashed()),

                Tables\Actions\DeleteAction::make() // Esta ação irá fazer o Soft Delete automaticamente
                ->label('Excluir') // Você pode personalizar o rótulo
                ->icon('heroicon-o-trash'),

                Tables\Actions\RestoreAction::make()
                    ->label('Restaurar')
                    ->icon('heroicon-o-arrow-up')
                    ->visible(fn ($record) => $record->trashed())
            ])
            ->bulkActions([

            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }
}
