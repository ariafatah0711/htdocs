<?php

namespace App\Filament\Resources\Trainings\Pages;

use App\Filament\Resources\Trainings\TrainingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTraining extends CreateRecord
{
    protected static string $resource = TrainingResource::class;

    //----setelah input selesai diarahkan ke halaman index----
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    //-------proses input many to many--------
    protected array $peserta = [];
    protected function mutateFormDataBeforeCreate(array $data):array
    {
        $this->peserta = $data['peserta'] ?? [];
        unset($data['peserta']);
        return $data;
    }

    protected function afterCreate(): void
    {
        foreach ($this->peserta as $peserta) {
            $this->record
                ->pegawais()
                ->attach($peserta
                    ['pegawai_id'], ['status' => $peserta['status'],]
                );
        }
    }
}
