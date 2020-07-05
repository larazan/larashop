<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
    protected $fillable = [
		'order_id',
		'product_id',
		'qty',
		'base_price',
		'base_total',
		'tax_amount',
		'tax_percent',
		'discount_amount',
		'discount_percent',
		'sub_total',
		'sku',
		'type',
		'name',
		'weight',
		'attributes',
	];

	/**
	 * Define relationship with the Product
	 *
	 * @return void
	 */
	public function product()
	{
		return $this->belongsTo('App\Models\Product');
	}
}
