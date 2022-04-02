<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function getDisplayBodyAttribute(){
        return nl2br($this->body);
    }

    public function getSnippetAttribute(){
        return explode("\n\n", $this->body)[0];
    }
}
