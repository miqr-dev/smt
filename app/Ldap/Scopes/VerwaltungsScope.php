<?php

namespace App\Ldap\Scopes;

use LdapRecord\Query\Model\Builder;
use LdapRecord\Models\Scope;
use LdapRecord\Models\ActiveDirectory\Group;
use LdapRecord\Models\Model;

class VerwaltungsScope implements Scope
{
    /**
     * Apply the scope to a given LDAP query builder.
     *
     * @param Builder $query
     * @param Model $model
     * @return void
     */
    public function apply(Builder $query, Model $model): void
    {
        $verwaltungsDn = 'CN=Verwaltung,OU=Verwaltung,OU=Standort Erfurt,OU=M-I-Q-R,DC=miqr,DC=local';
        $group = Group::find($verwaltungsDn);

        if ($group) {
            $query->whereMemberOf($group);
        }
    }
}