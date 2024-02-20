<?php

namespace App\Filament\Resources\TicketResource\Pages;

use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\View;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables;
use Filament\Actions;
use App\Models\Ticket;
use Filament\Resources\Table;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\TicketResource;

class ViewTicket extends ViewRecord
{
    protected static string $resource = TicketResource::class;

    protected function getTables(): array
    {
        return [
            'peripheriRequests' => $this->getPeripheriRequestsTable(),
        ];
    }

    protected function getPeripheriRequestsTable(): Table
    {
        return Tables\Table::make()
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID'),
                // Add other relevant columns for PeripheriRequest, e.g.,
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('city.name'),
                Tables\Columns\TextColumn::make('location.name'),
                Tables\Columns\TextColumn::make('room.name'),
            ])
            ->actions([
                Actions\ViewAction::make(), // Define actions as needed
            ]);
    }
}
