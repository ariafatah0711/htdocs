<?php

namespace App\Filament\Resources\JenisTrainings;

use App\Filament\Resources\JenisTrainings\Pages\CreateJenisTraining;
use App\Filament\Resources\JenisTrainings\Pages\EditJenisTraining;
use App\Filament\Resources\JenisTrainings\Pages\ListJenisTrainings;
use App\Filament\Resources\JenisTrainings\Schemas\JenisTrainingForm;
use App\Filament\Resources\JenisTrainings\Tables\JenisTrainingsTable;
use App\Models\JenisTraining;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class JenisTrainingResource extends Resource
{
    protected static ?string $model = JenisTraining::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_jenis';

    public static function form(Schema $schema): Schema
    {
        return JenisTrainingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JenisTrainingsTable::configure($table);
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
            'index' => ListJenisTrainings::route('/'),
            'create' => CreateJenisTraining::route('/create'),
            'edit' => EditJenisTraining::route('/{record}/edit'),
        ];
    }
}
