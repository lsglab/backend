<?php

namespace App\Models\generated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; 
use App\Models\generated\Role; 
use App\Models\Subject; 
use App\Models\generated\EntryPermission; 


class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['creator_id','action','role_id','subject_id',];
    protected $hidden = [];
    protected $attributes = [];
    protected $casts = [];

    //relationships: 

                
	public function created_by(){
        return $this->belongsTo(User::class,'creator_id');
    }
                
	public function role(){
        return $this->belongsTo(Role::class,'role_id');
    }
                
	public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }
                
	public function entry_permissions(){
        return $this->morphMany(EntryPermission::class,'entry');
    }
}