<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\ColorPicker::make('first_color')
                    ->nullable(),
                Forms\Components\ColorPicker::make('second_color')
                    ->nullable(),
                Forms\Components\ColorPicker::make('third_color')
                    ->nullable(),
                Forms\Components\TextInput::make('main_title')
                    ->nullable(),
                Forms\Components\TextInput::make('sub_title')
                    ->nullable(),
                Forms\Components\RichEditor::make('description')
                    ->nullable()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ColorColumn::make('first_color'),
                Tables\Columns\ColorColumn::make('second_color'),
                Tables\Columns\ColorColumn::make('third_color'),
                Tables\Columns\TextColumn::make('main_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sub_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
