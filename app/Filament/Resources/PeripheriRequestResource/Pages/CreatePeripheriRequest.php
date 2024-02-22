<?php

namespace App\Filament\Resources\PeripheriRequestResource\Pages;

use Filament\Actions;
use App\Models\Ticket;
use App\Models\PeripheriRequest;
use Illuminate\Support\Facades\DB;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\PeripheriRequestResource;
use Illuminate\Support\Facades\Auth;

class CreatePeripheriRequest extends CreateRecord
{
  protected static string $resource = PeripheriRequestResource::class;


  protected function handleRecordCreation(array $data): Model
  {
    DB::beginTransaction();

    try {
      // Create the Ticket first
      $ticket = Ticket::create([
        'submitter_id' => Auth::user()->id,
        'status' => 'Nicht begonnen',
        'priority' => 'Normal',
        'type' => 'Peripheri Anfrage',
        'onLocation' => false
      ]);


      // Now, create the PeripheriRequest and associate it with the Ticket
      $peripheriRequest = PeripheriRequest::make($data);
      $peripheriRequest->ticketable()->associate($ticket);
      $peripheriRequest->save();

      // Commit the transaction
      DB::commit();

      return $peripheriRequest;
    } catch (\Exception $e) {
      // Rollback the transaction in case of error
      DB::rollback();

      // Handle the error, e.g., log it or throw it
      throw $e;
    }
  }
}
