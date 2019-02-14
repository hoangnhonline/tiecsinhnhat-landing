<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DatMon extends Model  {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'dat_mon';	

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
    protected $fillable = ['phone', 'table_no', 'food_id_list'];
    
}
