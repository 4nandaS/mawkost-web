<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TempatTerdekatResource\Pages;
use App\Models\TempatTerdekat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class TempatTerdekatResource extends Resource
{
    protected static ?string $model = TempatTerdekat::class;

    protected static ?string $navigationIcon = 'heroicon-o-map'; // Ikon navigasi

    protected static ?string $navigationGroup = 'tempat';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_tempat')
                    ->required()
                    ->label('Nama Tempat Terdekat'), // Label untuk input
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_tempat')
                    ->sortable()
                    ->searchable()
                    ->label('Nama Tempat Terdekat'), // Label untuk kolom
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTempatTerdekat::route('/'),
            'create' => Pages\CreateTempatTerdekat::route('/create'),
            'edit' => Pages\EditTempatTerdekat::route('/{record}/edit'),
        ];
    }
}
