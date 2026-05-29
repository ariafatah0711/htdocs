<?php

namespace App\Filament\Resources\Pegawais\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class PegawaisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('nim')
                    ->searchable(),
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('gender')
                    ->badge(),
                TextColumn::make('divisi.nama_divisi')
                    ->label('Divisi')
                    ->searchable()
                    ->sortable(),
                    // ->numeric()
                    // ->sortable(),
                TextColumn::make('jabatan.nama_jabatan')
                    ->label('Jabatan')
                    ->searchable()
                    ->sortable(),
                    // ->numeric()
                    // ->sortable(),
                TextColumn::make('tmp_lahir')
                    ->searchable(),
                TextColumn::make('tgl_lahir')
                    ->date()
                    ->sortable(),
                TextColumn::make('hp')
                    ->searchable(),
                // TextColumn::make('foto')
                    // ->searchable(),
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->circular(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
