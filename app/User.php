<?php

namespace GymForGym;

use Carbon\Carbon;
use Eloquent;
use GymForGym\Structure\EmailAddress;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @mixin Builder
 * @mixin Eloquent
 *
 * @property EmailAddress $email
 * @property string       $password
 * @property int          $id
 * @property string       $display_name
 * @property string       $remember_token
 * @property Carbon       $created_at
 * @property Carbon       $updated_at
 */
class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return EmailAddress
     */
    public function getEmailAttribute(): Structure\EmailAddress
    {
        return new EmailAddress($this->attributes['email']);
    }

    /**
     * @return string
     */
    public function getDisplayNameAttribute(): string
    {
        return $this->attributes['display_name'] ?? $this->email->userName();
    }
}
