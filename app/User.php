<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','mobile','date_of_birth','title','surname','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_of_birth' =>'datetime',
    ];
    public function businesses(){
        return $this->hasMany('App\Business');
    }
    public function working_partner_detail(){
        return $this->hasOne('App\WorkingPartnerDetail');
    }
    public function messages(){
        return $this->hasMany('App\Message');
    }
    public function threads(){
        return $this->belongsToMany('App\Thread');
    }
    public function senders(){
        return $this->hasMany('App\Offer','sender_id');
    }
    public function recievers(){
        return $this->hasMany('App\Offer','reciever_id');
    }
    
    // public function conversation_lists()
    // {
    //     return $this->hasMany('App\ConversationList');
    // }
    // public function owner_conversation_lists()
    // {
    //     return $this->hasMany('App\OwnerConversationList');
    // }
}
