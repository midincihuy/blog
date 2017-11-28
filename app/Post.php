<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
      'user_id', 'title', 'body',
  ];
  public function comment()
  {
    return $this->hasMany(Comment::class);
  }

  public function storeComment($comment)
  {
    $this->comment()->create($comment);
  }

  public function creator()
  {
    return $this->BelongsTo(User::class, 'user_id');
  }
}
