<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public function post() {
      return $this->belongsTo('App\Post')->first();
    }

    public function reply_to() {
      return Post::find($this->replyto_id);
    }

    public function timeline()
    {
      return Timeline::where('post_id','=', $this->post_id)->first();
    }
}
