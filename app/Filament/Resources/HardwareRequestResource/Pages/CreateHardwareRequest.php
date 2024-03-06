<?php

namespace App\Filament\Resources\HardwareRequestResource\Pages;

use Filament\Actions;
use App\Models\Ticket;
use App\Models\HardwareRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\HardwareRequestResource;
use Illuminate\Database\Eloquent\Model;

class CreateHardwareRequest extends CreateRecord
{
  protected static string $resource = HardwareRequestResource::class;

  protected function handleRecordCreation(array $data): Model
  {
    DB::beginTransaction();

    try {
      // Create the Ticket first
      $ticket = Ticket::create([
        'submitter_id' => Auth::user()->id,
        'status' => 'Nicht begonnen',
        'priority' => 'Normal',
        'type' => 'Hardware Anfrage',
        'onLocation' => false
      ]);


      // Now, create the hardwareRequest and associate it with the Ticket
      $hardwareRequest = HardwareRequest::make($data);
      $hardwareRequest->ticketable()->associate($ticket);
      $hardwareRequest->save();

      // Commit the transaction
      DB::commit();

      return $hardwareRequest;
    } catch (\Exception $e) {
      // Rollback the transaction in case of error
      DB::rollback();

      // Handle the error, e.g., log it or throw it
      throw $e;
    }
  }
}
