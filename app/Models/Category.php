<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Storage;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'name', 
        'slug',
        'category_image' 
    ];
    protected $appends = ['image'];

    public function getImageAttribute(){
        return Storage::url('images/category/thumbnail/'.$this->category_image);//'/storage/images/category/'.$this->category_image;
    }

    public function scopeActive(){
        return $this->where('status', '1');
    }
    
    protected static function boot()
    {
        parent::boot();
        static::created(function ($post) {     
            $post->slug = $post->generateSlug($post->name);
            $post->save();
        });
    }
    
    private function generateSlug($name)
    {
        if (static::whereSlug($slug = Str::slug($name))->exists()) {
            $max = static::whereName($name)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }    


    public function child()
    {
        return $this->hasMany('App\Models\Category','parent','id');
    }

    public function parentCategory()
    {
        return $this->hasOne('App\Models\Category','id','parent');
    }



}
