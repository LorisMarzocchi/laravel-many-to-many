<?php

namespace App\Models;

use App\Models\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    public function type(){

        // hasMany si usa sul model della tabella che NON ha la chiave esterna in una relazione uno a molti
        // hasOone si usa sul model della tabella che NON ha la chiave esterna in una relazione uno a uno

        return $this->belongsTo(Type::class);

    }
}
