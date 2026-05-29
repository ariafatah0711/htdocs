<?php

namespace App\Filament\Resources\JenisTrainings\Pages;

use App\Filament\Resources\JenisTrainings\JenisTrainingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditJenisTraining extends EditRecord
{
    protected static string $resource = JenisTrainingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
