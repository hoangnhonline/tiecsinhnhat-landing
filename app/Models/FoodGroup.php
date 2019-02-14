<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class FoodGroup extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'food_group';

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
                            'display_order',                           
                            'created_user', 
                            'updated_user'
                        ];
    public function food(){
        return $this->hasMany('App\Models\Food', 'food_group_id');
    }
}
