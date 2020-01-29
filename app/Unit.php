<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    
    public function getImage(Type $var = null)
    {
        Storage::put('file.jpg', $contents, 'public');
    }
    
}
