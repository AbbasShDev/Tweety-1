<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use likable;
    protected $fillable = ['body', 'user_id'];
    /**
     * @var mixed
     */

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function storeImage($image) {
        $this->image()->updateOrCreate([
           'tweetImage' => $image
        ]);
    }

    public function getImage() {
        return asset('storage/'.$this->image['tweetImage']);
    }


    public function image(){
        return $this->hasOne(TweetImage::class);
    }

}
