<?php
namespace App\Filament\Resources;

use App\Filament\Resources\MasterpieceResource\Pages;
use App\Models\Masterpiece;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MasterpieceResource extends Resource
{
    protected static ?string $model = Masterpiece::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->nullable(),
                Forms\Components\ColorPicker::make('color')
                    ->nullable(),
                Forms\Components\Textarea::make('description')
                    ->nullable()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->nullable(),
                Forms\Components\FileUpload::make('second_image')
                    ->image()
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ColorColumn::make('color'),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\ImageColumn::make('second_image'),
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
            'index' => Pages\ListMasterpieces::route('/'),
            'create' => Pages\CreateMasterpiece::route('/create'),
            'edit' => Pages\EditMasterpiece::route('/{record}/edit'),
        ];
    }
}
