<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourierListResource\Pages;
use App\Filament\Resources\CourierListResource\RelationManagers;
use App\Models\Tracker;
use App\Models\TrackingEvent;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms;
use Filament\Forms\Form;
use App\Filament\Actions\Action;
use App\Filament\Actions\PrintCourierAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourierListResource extends Resource
{
    protected static ?string $model = Tracker::class;


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\DatePicker::make('sent_date')
                    ->required()
                    ->label('Sent Date'),
                Forms\Components\DatePicker::make('arrival_date')
                    ->required()

                    ->label('Arrival Date'),
                Forms\Components\TextInput::make('senders_name')
                    ->required()

                    ->label('Sernders Name'),
                Forms\Components\TextInput::make('senders_email')
                    ->required()
                    ->maxLength(255)
                    ->label('Senders Email'),
                Forms\Components\TextInput::make('senders_phone')
                    ->tel()
                    ->required()
                    ->maxLength(20)
                    ->label('Senders Phone'),
                Forms\Components\TextInput::make('senders_address')
                    ->required()
                    ->maxLength(255)
                    ->label('Senders Address'),
                Forms\Components\TextInput::make('senders_country')
                    ->required()
                    ->maxLength(255)
                    ->label('Senders Country'),


                Forms\Components\TextInput::make('receivers_name')
                    ->required()
                    ->maxLength(255)
                    ->label('Receivers Name'),
                Forms\Components\TextInput::make('receivers_email')
                    ->required()
                    ->maxLength(255)
                    ->label('Receivers Email'),
                Forms\Components\TextInput::make('receivers_phone')
                    ->tel()
                    ->required()
                    ->maxLength(20)
                    ->label('Receivers Phone'),
                Forms\Components\TextInput::make('receivers_address')
                    ->required()
                    ->maxLength(255)
                    ->label('Receivers Address'),
                Forms\Components\TextInput::make('receivers_country')
                    ->required()
                    ->maxLength(255)
                    ->label('Receivers Country'),

                Forms\Components\TextInput::make('tracking_number')
                    ->label('Tracking Number')
                    ->hidden(),

                Forms\Components\TextInput::make('items')
                    ->required()
                    ->maxLength(255)
                    ->label('Items/Descriptions'),

                Forms\Components\TextInput::make('weight')
                    ->required()
                    ->maxLength(255)
                    ->label('Weight'),

                Forms\Components\Select::make('shipping_method')
                    ->options([
                        'express' => 'Express',
                        'groundshipping' => 'Ground Shipping',
                        'airfreight' => 'Air Freight',
                        'oceanfreight' => 'Ocean Freight',
                        'Rail' => 'Rail',

                    ])
                    ->required(),

                Forms\Components\Select::make('status')
                    ->options([
                        'waiting' => 'waiting',
                        'shipped' => 'Shipped',
                        'in_transit' => 'In Transit',
                        'arrived' => 'Arrived Destination',
                        'hold' => 'Onhold',
                        'out' => 'Out for Delivery',
                        'delivered' => 'Delivered',

                    ])
                    ->default('waiting') // Set the default value to the first option
                    ->label('Status')
                    ->disabled(),



                Forms\Components\TextInput::make('tax')
                    ->required()
                    ->maxLength(255)
                    ->label('Tax'),

            ]);
        // ->saved(function ($record) {
        //     Log::info('Tracker updated', ['id' => $record->id, 'status' => $record->status]);

        //     TrackingEvent::create([
        //         'tracker_id' => $record->id,
        //         'status' => $record->status,
        //     ]);
        // });

    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc') // Sort by created_at descending by default
            ->columns([
                Tables\Columns\TextColumn::make('tracking_number')
                    ->label('Tracking Number')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('senders_name')
                    ->label('Senders Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('receivers_name')
                    ->label('Receivers Name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

                Tables\Actions\ViewAction::make()
                    ->url(fn($record) => route('couriertrackings.show', $record)), // Adjust the route if necessary
                Tables\Actions\DeleteAction::make(),


            ])

            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCourierLists::route('/'),
            'create' => Pages\CreateCourierList::route('/create'),
            'update' => Pages\EditCourierList::route('/{record}/update'),
        ];
    }
}
