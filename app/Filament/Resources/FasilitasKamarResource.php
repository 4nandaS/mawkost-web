<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FasilitasKamarResource\Pages;
use App\Filament\Resources\FasilitasKamarResource\RelationManagers;
use App\Models\FasilitasKamar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;


class FasilitasKamarResource extends Resource
{
    protected static ?string $model = FasilitasKamar::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = 'fasilitas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('fasilitas_kamar')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('fasilitas_kamar'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFasilitasKamars::route('/'),
            'create' => Pages\CreateFasilitasKamar::route('/create'),
            'edit' => Pages\EditFasilitasKamar::route('/{record}/edit'),
        ];
    }
}
