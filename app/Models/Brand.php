<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = [
		'id',
		'created_at',
		'updated_at',
	];

	public const UPLOAD_DIR = 'uploads';

	public const ACTIVE = 'active';
	public const INACTIVE = 'inactive';

	public const STATUSES = [
		self::ACTIVE => 'Active',
		self::INACTIVE => 'Inactive',
	];

	public const EXTRA_LARGE = '1920x643';
	public const SMALL = '135x75';

	/**
	 * Scope active product
	 *
	 * @param Eloquent $query query builder
	 *
	 * @return Eloquent
	 */
	public function scopeActive($query)
	{
		return $query->where('status', self::ACTIVE);
	}

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'product_brands');
    }
	
}
