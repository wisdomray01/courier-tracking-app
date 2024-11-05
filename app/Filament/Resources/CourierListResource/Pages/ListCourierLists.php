<?php

namespace App\Filament\Resources\CourierListResource\Pages;

use App\Filament\Resources\CourierListResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCourierLists extends ListRecords
{
    protected static string $resource = CourierListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
