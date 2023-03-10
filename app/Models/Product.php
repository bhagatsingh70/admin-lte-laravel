<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;
use Brand;
use Str;

class Product extends Model
{
    use HasFactory;
 

    protected $appends = ['productimage'];

    public function getProductImageAttribute(){
        return url('/').Storage::url('images/product/thumbnail/'.$this->image);//'/storage/images/product/'.$this->image;
    }


    protected static function boot()
    {
        parent::boot();
        static::created(function ($post) {     
            $post->slug = $post->generateSlug($post->product_name);
            $post->save();
        });
    }

    public function scopeStatus($query){
        return $query->where('status', '1');
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

    public function Brand($query){
        return $query->hasOne(Brand::class, 'id', 'brand_id');
    }
}
