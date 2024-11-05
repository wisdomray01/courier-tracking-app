<?php

namespace App\Filament\Resources\CourierListResource\Pages;

use App\Filament\Resources\CourierListResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCourierList extends EditRecord
{
    protected static string $resource = CourierListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
