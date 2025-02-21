<?php

namespace App\Filament\Resources\TempatTerdekatResource\Pages;

use App\Filament\Resources\TempatTerdekatResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTempatTerdekat extends ListRecords
{
    protected static string $resource = TempatTerdekatResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
