<?php

namespace App\Models;

use App\Models\Type;
use App\Traits\Slugger;
use App\Models\Technology;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Slugger;


    public function getRouteKey()
    {
        return $this->slug;
    }



    public function type(){

        // hasMany si usa sul model della tabella che NON ha la chiave esterna in una relazione uno a molti
        // hasOone si usa sul model della tabella che NON ha la chiave esterna in una relazione uno a uno

        return $this->belongsTo(Type::class);

    }
    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }
}
