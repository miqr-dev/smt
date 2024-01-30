<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use LdapRecord\Laravel\Auth\LdapAuthenticatable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements LdapAuthenticatable
{
  use HasApiTokens, HasFactory, Notifiable, AuthenticatesWithLdap,  SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'email',
    'password',
    'firstname',
    'title',
    'username',
    'position',
    'description',
    'department',
    'office',
    'info',
    'postalcode',
    'state',
    'street',
    'location',
    'tel',
    'telephone_private',
    'mobile',
    'email_privat',
    'fax',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
    'name' => 'string',
    'firstname' => 'string',
    'title' => 'string',
    'username' => 'string',
    'position' => 'string',
    'description' => 'string',
    'department' => 'string',
    'office' => 'string',
    'info' => 'string',
    'postalcode' => 'string',
    'state' => 'string',
    'street' => 'string',
    'location' => 'string',
    'tel' => 'string',
    'telephone_private' => 'string',
    'mobile' => 'string',
    'email' => 'string',
    'email_privat' => 'string',
    'fax' => 'string',
  ];

  public function getFullNameAttribute()
  {
    return $this->firstname . ' ' . $this->name;
  }

  public function user(): HasOne
  {
    return $this->hasOne(Termination::class);
  }
}
