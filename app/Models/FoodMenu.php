<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class FoodMenu extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'food_menu';

     /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [                            
                            'food_id',
                            'menu_id',                            
                            'display_order'
                        ];
    
}
