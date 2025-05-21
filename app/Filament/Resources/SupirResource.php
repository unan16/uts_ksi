<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupirResource\Pages;
use App\Models\Supir;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupirResource extends Resource
{
    protected static ?string $model = Supir::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(100),

                TextInput::make('no_sim')
                    ->required()
                    ->unique(ignoreRecord: true),

                TextInput::make('alamat')
                    ->required()
                    ->maxLength(255),

                TextInput::make('telepon')
                    ->required()
                    ->tel(),

                DatePicker::make('tanggal_lahir')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable()->sortable(),
                TextColumn::make('no_sim'),
                TextColumn::make('alamat'),
                TextColumn::make('telepon'),
                TextColumn::make('tanggal_lahir')->date(),
            ])
            ->filters([
                //
            ])
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
            'index' => Pages\ListSupirs::route('/'),
            'create' => Pages\CreateSupir::route('/create'),
            'edit' => Pages\EditSupir::route('/{record}/edit'),
        ];
    }
}
