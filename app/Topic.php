<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'name',
        'description',
        'topic_id',
    ];

    public function subTopics () {
        return $this->hasMany(Topic::class, 'topic_id');
    }
}
