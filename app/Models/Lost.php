<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Notifications\VerifyEmail;



class Lost extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'uuid',
        'stripe_id',
        'pm_type',
        'pm_last_four',
        'email_verified',
        'email_verify_token',
        'tel1',
        'tel2',
        'mon1',
        'mon2',
        'mon3',
        'tue1',
        'tue2',
        'tue3',
        'wed1',
        'wed2',
        'wed3',
        'thu1',
        'thu2',
        'thu3',
        'fri1',
        'fri2',
        'fri3',
        'sat1',
        'sat2',
        'sat3',
        'sun1',
        'sun2',
        'sun3',
        'mode',
        'complete',
        'sold',
        'office',
        'order',

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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }
}
