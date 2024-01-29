<?php

namespace App\Ldap\Rules;

use LdapRecord\Laravel\Auth\Rule;
use LdapRecord\Models\Model as LdapRecord;
use LdapRecord\Models\ActiveDirectory\Group;
use Illuminate\Database\Eloquent\Model as Eloquent;

class onlyVerwaltungs implements Rule
{
    public function passes(LdapRecord $user, Eloquent $model = null): bool
    {
        $verwaltungs = Group::findorfail('cn=Verwaltung, ou=Verwaltung,ou=Standort Erfurt,ou=M-I-Q-R,dc=miqr,dc=local');
        return $user->groups()->recursive()->exists($verwaltungs);
    }

}