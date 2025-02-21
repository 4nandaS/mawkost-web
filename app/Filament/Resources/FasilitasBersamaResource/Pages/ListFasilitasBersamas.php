<?php

namespace App\Filament\Resources\FasilitasBersamaResource\Pages;

use App\Filament\Resources\FasilitasBersamaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFasilitasBersama extends ListRecords
{
    protected static string $resource = FasilitasBersamaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(), // Pastikan ini ada untuk menampilkan tombol create
        ];
    }
}
