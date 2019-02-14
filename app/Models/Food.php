<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Food extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'food';

     /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                            'name', 
                            'slug',
                            'food_type_id',
                            'food_group_id',
                            'price',
                            'mon_bac',
                            'image_url',
                            'display_order',                                                                            
                            'created_user', 
                            'updated_user'
                        ];
    public function foodMenu(){
        return $this->hasMany('App\Models\FoodMenu', 'food_id');
    }
    
}
