<?php

namespace App\Filament\Actions;

use Filament\Tables\Actions\Action;

class PrintCourierAction extends Action
{
    public static function make(?string $name = null): static
    {
        return parent::make($name ?? 'print_couriers') // Use the provided name or default to 'print_couriers'
            ->label('Print') // Set the label for the action
            ->icon('heroicon-o-printer') // Set the icon for the action
            ->action(function () {
                // Logic for printing, e.g., redirect to a PDF generation route
                return redirect(route('couriertrackings.print'));
            });
    }
}
