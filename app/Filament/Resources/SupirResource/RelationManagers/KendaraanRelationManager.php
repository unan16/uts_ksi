<?php

namespace App\Filament\Resources\SupirResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class KendaraanRelationManager extends RelationManager
{
    protected static string $relationship = 'kendaraan'; // nama method di Supir.php

    protected static ?string $title = 'Kendaraan';

    public function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            TextInput::make('plat_nomor')->required(),
            TextInput::make('merk')->required(),
            TextInput::make('jenis')->required(),
            TextInput::make('tahun')->numeric()->required(),
        ]);
    }

    public function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            TextColumn::make('plat_nomor'),
            TextColumn::make('merk'),
            TextColumn::make('jenis'),
            TextColumn::make('tahun'),
        ]);
    }
}
