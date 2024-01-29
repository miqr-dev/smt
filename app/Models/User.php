<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use LdapRecord\Laravel\Auth\LdapAuthenticatable;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    'name' => '',             
    // 'firstname' => '',   
    // 'title' => '', 
    // 'username' => '',
    // 'position' => '',     
    // 'description' => '',
    // 'department' => '',
    // 'office' => '', 
    // 'info' => '',
    // 'postalcode' => '',
    // 'state' => '',
    // 'street' => '',
    // 'location' => '',
    // 'tel' => '',
    // 'telephone_private' => '',
    // 'mobile' => '',
    // 'email' => '',
    // 'email_privat' => '', 
    // 'fax' => '', 

  ];
}
