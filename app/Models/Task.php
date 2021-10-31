<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model {

	const CREATED_AT = 'createdAt';
	const UPDATED_AT = 'updatedAt';

	const STATUS_NEW		= 10;
	const STATUS_PROGRESS	= 20;
	const STATUS_COMPLETED	= 30;

	public static $statusMap = [
		self::STATUS_NEW => 'New',
		self::STATUS_PROGRESS => 'In Progress',
		self::STATUS_COMPLETED => 'Completed'
	];

    use HasFactory;

	/**
	 * The storage format of the model's date columns.
	 *
	 * @var string
	 */
	protected $dateFormat = 'Y-m-d H:i:s';

	protected $fillable = [
		'title', 'description', 'status',
		'hoursRequired', 'hoursConsumed',
		'plannedStartDate', 'plannedEndDate',
		'actualStartDate', 'actualEndDate',
		'content'
	];

	public function getStatusStr() {

		return self::$statusMap[ $this->status ];
	}

	/**
	 * The "booting" method of the model.
	 *
	 * @return void
	 */
	protected static function boot() {

		parent::boot();

		static::creating(function ($query) {
			$query->hoursRequired = $query->hoursRequired ?? 0;
			$query->hoursConsumed = $query->hoursConsumed ?? 0;
		});
	}
}
