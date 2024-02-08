<?php

namespace App\Listeners;

use LdapRecord\Auth\Events\Bound;
use Illuminate\Support\Facades\Auth;

class AssignDefaultRoleOnLogin
{
    /**
     * Handle the event.
     *
     * @param  Bound  $event
     * @return void
     */
    public function handle(Bound $event)
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // If the user has no roles, assign the default role
        if ($user && $user->roles()->count() === 0) {
            $user->assignRole('panel_user');
        }
    }
}