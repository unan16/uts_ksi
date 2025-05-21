<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KendaraanResource\Pages;
use App\Models\Kendaraan;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;

class KendaraanResource extends Resource
{
    protected static ?string $model = Kendaraan::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck'; // Ikon kendaraan di sidebar

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('supir_id')
                    ->relationship('supir', 'nama')
                    ->label('Supir')
                    ->required(),

                TextInput::make('plat_nomor')->required(),
                TextInput::make('merk')->required(),
                TextInput::make('jenis')->required(),
                TextInput::make('tahun')->numeric()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('supir.nama')->label('Supir')->searchable(),
                TextColumn::make('plat_nomor')->searchable(),
                TextColumn::make('merk'),
                TextColumn::make('jenis'),
                TextColumn::make('tahun'),
            ])
            ->filters([])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListKendaraans::route('/'),
            'create' => Pages\CreateKendaraan::route('/create'),
            'edit' => Pages\EditKendaraan::route('/{record}/edit'),
        ];
    }
}
