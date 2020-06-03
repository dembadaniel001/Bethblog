<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{

    use SoftDeletes;
    protected $dates = [
        'created_at'
    ];
    protected $fillable = [
        'title','description','content','image','published_at','category_id','user_id',
    ];

    /***
     * delete post image from storage
     * 
     * @return void
     */
    public function deleteImage(){

        Storage::delete($this->image);
    }
     public function category(){
         return $this->belongsTo(Category::class);
     }
     public function user(){
         return $this->belongsTo(User::class);
     }
     public function replies(){
        return $this->hasMany(Reply::class);
    }
    public function scopePublished($query){
        return $query->where('created_at','<=',now());
    }
    public function scopeSearched($query){

        $search = request()->query('search');
        if (!$search) {
            return $query->published();
            // ->published();
        }
        return $query->published()->where('title','LIKE',"%{$search}%");
    
    }
}
