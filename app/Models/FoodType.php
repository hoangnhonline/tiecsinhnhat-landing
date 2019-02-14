<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class FoodType extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'food_type';

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
                            'display_order',                           
                            'created_user', 
                            'updated_user'
                        ];
    
    public function foodGroup(){
        return $this->hasMany('App\Models\FoodGroup', 'food_type_id');
    }
    public function food(){
        return $this->hasMany('App\Models\Food', 'food_type_id');
    }
}
