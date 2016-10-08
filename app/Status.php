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
}
