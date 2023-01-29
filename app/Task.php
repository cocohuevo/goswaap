<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable =[
        'num_boscoins','description','date_request','date_completian','type','deleted',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
