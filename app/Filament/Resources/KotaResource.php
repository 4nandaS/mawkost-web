<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KotaResource\Pages;
use App\Models\Kota;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class KotaResource extends Resource
{
    protected static ?string $model = Kota::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static ?string $navigationGroup = 'tempat';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('kota')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kota')->sortable()->searchable(),
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
            'index' => Pages\ListKotas::route('/'),
            'create' => Pages\CreateKota::route('/create'),
            'edit' => Pages\EditKota::route('/{record}/edit'),
        ];
    }
}
