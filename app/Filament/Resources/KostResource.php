<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KostResource\Pages;
use App\Models\Kost;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use App\Models\FasilitasKamar;
use App\Models\FasilitasBersama;
use App\Models\kota;
use App\Models\TempatTerdekat;
use Filament\Forms\Components\Select;

class KostResource extends Resource
{
    protected static ?string $model = Kost::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $navigationGroup = 'kamar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('id_kost')->disabled(),
                TextInput::make('nama_kost')->required(),
                TextInput::make('alamat_kost')->required(),
                Select::make('kota')
                    ->options(Kota::all()->pluck('kota', 'id'))
                    ->searchable()
                    ->required(),
                    MultiSelect::make('tempat_terdekat')
                    ->options(TempatTerdekat::all()->pluck('nama_tempat', 'id')) // Mengambil nama tempat dari tabel tempat_terdekat
                    ->reactive() // Menandakan bahwa ini adalah komponen reaktif
                    ->afterStateUpdated(function ($state, callable $set) {
                        // Mengambil nama tempat berdasarkan ID yang dipilih
                        $set('tempat_terdekat', TempatTerdekat::whereIn('id', $state)->pluck('nama_tempat')->toArray());
                    })
                    ->required(),
                TextInput::make('harga_kost')->numeric()->required(),
                MultiSelect::make('fasilitas_kamar')
                    ->options(FasilitasKamar::all()->pluck('fasilitas_kamar', 'id'))
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $fasilitasKamarNames = FasilitasKamar::whereIn('id', $state)->pluck('fasilitas_kamar')->toArray();
                        $set('fasilitas_kamar', $fasilitasKamarNames);
                    })
                    ->required(),

                MultiSelect::make('fasilitas_bersama')
                    ->options(FasilitasBersama::all()->pluck('fasilitas_bersama', 'id'))
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $fasilitasBersamaNames = FasilitasBersama::whereIn('id', $state)->pluck('fasilitas_bersama')->toArray();
                        $set('fasilitas_bersama', $fasilitasBersamaNames);
                    })
                    ->required(),
                Select::make('gender')
                    ->options([
                        'Putra' => 'Putra',
                        'Putri' => 'Putri',
                        'Campur' => 'Campur',
                    ])
                    ->required(),                
                TextInput::make('no_hp')->required(),
                FileUpload::make('foto')
                    ->image()
                    ->multiple()
                    ->disk('public') // Pastikan disk yang digunakan sesuai dengan konfigurasi Anda
                    ->directory('kosts') // Direktori di mana gambar akan disimpan
                    ->required(),
                Textarea::make('informasi_tambahan')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_kost'),
                TextColumn::make('nama_kost'),
                TextColumn::make('alamat_kost'),
                TextColumn::make('kota')->sortable()
                ->searchable(),
                TextColumn::make('tempat_terdekat')->limit(50),
                TextColumn::make('harga_kost'),
                TextColumn::make('fasilitas_kamar')->limit(50),
                TextColumn::make('fasilitas_bersama')->limit(50),
                TextColumn::make('gender'),
                TextColumn::make('no_hp'),
                ImageColumn::make('foto')
    ->disk('public') // Pastikan disk yang benar digunakan
    ->getStateUsing(function ($record) {
        return $record->foto; // Mengambil array foto dari model
    })
    ->width(200)
    ->height(200)
    ->stacked()
    ->limit(3)
    ->limitedRemainingText(),
                TextColumn::make('informasi_tambahan'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKosts::route('/'),
            'create' => Pages\CreateKost::route('/create'),
            'edit' => Pages\EditKost::route('/{record}/edit'),
        ];
    }
}
