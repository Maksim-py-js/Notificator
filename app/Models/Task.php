<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public function files() {
        return $this->hasMany('App\Models\TaskFile', 'task');
    }
    public function workplaces() {
        return $this->hasMany('App\Models\TaskWorkplaceUser', 'workplace');
    }
    public function users() {
        return $this->hasMany('App\Models\TaskWorkplaceUser', 'user');
    }
}
