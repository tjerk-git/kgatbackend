<?php

namespace App\Filament\Resources\MasterpieceResource\Pages;

use App\Filament\Resources\MasterpieceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMasterpieces extends ListRecords
{
    protected static string $resource = MasterpieceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
