<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Filament\Forms\Components\Select;
use Spatie\Permission\Traits\HasRoles;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use LdapRecord\Laravel\Auth\LdapAuthenticatable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use LdapRecord\Laravel\Auth\AuthenticatesWithLdap;
use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements LdapAuthenticatable
{
  use HasApiTokens, HasFactory, Notifiable, AuthenticatesWithLdap, SoftDeletes, HasRoles, HasPanelShield;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'fullname',
    'name',
    'email',
    'password',
    'firstname',
    'title',
    'avatar',
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

  protected $hidden = [
    'password',
    'remember_token',
  ];

  protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
    'fullname' => 'string',
    'name' => 'string',
    'firstname' => 'string',
    'title' => \App\Enums\Ptitle::class,
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

  protected array $guard_name = ['ldap', 'web'];

  public function getFullNameAttribute()
  {
    return $this->firstname . ' ' . $this->name;
  }

  public function user(): HasOne
  {
    return $this->hasOne(Termination::class);
  }

  public static function getForm(): array
  {
    return [
      TextInput::make('name')
        ->maxLength(255),
      TextInput::make('firstname')
        ->maxLength(255),
      Select::make('title')
      ->label('Anrede')
      ->options(\App\Enums\Ptitle::class),
      FileUpload::make('avatar')
      ->avatar()
      // ->directory('avatars')
      ->imageEditor()
      ->image()
      ->maxSize(1024*1024*10),
      TextInput::make('username')
        ->maxLength(255),
      TextInput::make('position')
        ->maxLength(255),
      TextInput::make('description')
        ->maxLength(255),
      TextInput::make('department')
        ->maxLength(255),
      TextInput::make('office')
        ->maxLength(255),
      TextInput::make('info')
        ->maxLength(255),
      TextInput::make('postalcode')
        ->maxLength(255),
      TextInput::make('state')
        ->maxLength(255),
      TextInput::make('street')
        ->maxLength(255),
      TextInput::make('location')
        ->maxLength(255),
      TextInput::make('tel')
        ->tel()
        ->maxLength(255),
      TextInput::make('fax')
        ->maxLength(255),
      TextInput::make('telephone_private')
        ->tel()
        ->maxLength(255),
      TextInput::make('mobile')
        ->maxLength(255),
      TextInput::make('email_privat')
        ->email()
        ->maxLength(255),
      TextInput::make('email')
        ->email()
        ->maxLength(255),
      // TextInput::make('password')
      //   ->password()
      //   ->maxLength(255),
      // TextInput::make('guid')
      //   ->maxLength(255),
      // TextInput::make('domain')
      //   ->maxLength(255),
      Select::make('roles')
        ->relationship('roles', 'name')
        ->multiple()
        ->preload()
        ->searchable()
     ];
  }
}
