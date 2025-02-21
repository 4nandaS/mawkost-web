<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FasilitasBersamaResource\Pages;
use App\Models\FasilitasBersama;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class FasilitasBersamaResource extends Resource
{
    protected static ?string $model = FasilitasBersama::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = 'fasilitas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('fasilitas_bersama')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('fasilitas_bersama'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);;
    }

    public static function getPages(): array
{
    return [
        'index' => Pages\ListFasilitasBersama::route('/'),
        'create' => Pages\CreateFasilitasBersama::route('/create'),
        'edit' => Pages\EditFasilitasBersama::route('/{record}/edit'),
    ];
}
}
