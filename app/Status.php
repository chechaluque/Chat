<?php

namespace Chat;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';

    protected $fillable = [
      'body'
    ];

    public function user()
    {
      return $this->belongsTo('Chat\User', 'user_id');
    }
    public function scopeNotReply($query)
    {
      return $query->whereNull('parent_id');
    }
    public function replies()
    {
      return $this->hasMany('Chat\Status', 'parent_id');
    }
    public function likes()
    {
      return $this->morphMany('Chat\Like', 'likeable');
    }
}
