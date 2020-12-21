<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    protected $appends = ['avatar_path', 'resume_path'];


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
    ];


    public function position()
    {
        return $this->belongsTo(Position::class);
    }//end of position


    /**
    * Accessors.
    */
    public function getAgeAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['date_of_birth'])->age;
    }//end of get age

    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get first name

    public function getMiddleNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get middle name

    public function getLastNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get last name

    public function getGenderAttribute($value)
    {
        return ucfirst($value);

    }//end of get last name

    public function getAvatarPathAttribute()
    {
        return asset('uploads/employee_avatars/' . $this->avatar);
    }//end of get avatar path

    public function getResumePathAttribute()
    {
        return asset('uploads/employee_resumes/' . $this->resume);
    }//end of get avatar path
}

