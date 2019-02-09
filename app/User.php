<?php


namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;
class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','bio','location','age','website','online','activity'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
    	return $this->hasMany('App\Post');
    }
    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function friendsOfMine(){
        $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id');
    }
    public function friendOf(){
        $this->belongsToMany('App\User', 'friends', 'friend_id', 'user_id');
    }
    public function friends(){
        return $this->friendsOfMine()->wherePivot('accepted' , true)->get()
            ->merge($this->friendOf()->where('accepted', true)->get());

    }
    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }
}
