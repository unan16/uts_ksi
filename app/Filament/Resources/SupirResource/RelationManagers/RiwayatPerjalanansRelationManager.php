<?php

namespace App\Filament\Resources\SupirResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Columns\TextColumn;

class RiwayatPerjalanansRelationManager extends RelationManager
{
    protected static string $relationship = 'riwayatPerjalanans';

    protected static ?string $title = 'Riwayat Perjalanan';

    public function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('tujuan')
                    ->required(),

                DatePicker::make('tanggal_berangkat')
                    ->required(),

                TimePicker::make('jam_berangkat')
                    ->required(),

                TextInput::make('keterangan')
                    ->maxLength(255),
            ]);
    }

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('tujuan')->searchable(),
                TextColumn::make('tanggal_berangkat')->date(),
                TextColumn::make('jam_berangkat'),
                TextColumn::make('keterangan')->limit(30),
            ])
            ->filters([])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
