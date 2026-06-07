<?php

namespace App\Filament\Resources\JenisTrainings\Pages;

use App\Filament\Resources\JenisTrainings\JenisTrainingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListJenisTrainings extends ListRecords
{
    protected static string $resource = JenisTrainingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
