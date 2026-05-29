<?php

namespace App\Filament\Resources\Trainings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TrainingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('jenis_training_id')
                    ->required()
                    ->numeric(),
                TextInput::make('nama_training')
                    ->required(),
                TextInput::make('penyelenggara')
                    ->required(),
                DatePicker::make('tanggal_training')
                    ->required(),
                TextInput::make('lokasi')
                    ->required(),
            ]);
    }
}
