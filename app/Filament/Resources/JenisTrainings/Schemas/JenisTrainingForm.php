<?php

namespace App\Filament\Resources\JenisTrainings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class JenisTrainingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_jenis')
                    ->required(),
            ]);
    }
}
