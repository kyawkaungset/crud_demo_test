<?php

namespace App\Models;

use App\Actions\StoreActivityLog;
use App\Traits\GlobalStoreActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;
    use GlobalStoreActivity;

    protected static function booted()
    {
        static::bootAction();
    }

    protected $table = 'students';
    protected $fillable = [
        'name',
        'gender'
    ];

    public function activityLogs()
    {
        return $this->morphMany(ActivityLog::class, 'loggable');
    }

    public function createable()
    {
        return $this->morphTo();
    }
}
