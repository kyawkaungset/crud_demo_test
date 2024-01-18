<?php

namespace App\Traits;

use App\Actions\StoreActivityLog;
use Illuminate\Support\Facades\Log;

trait GlobalStoreActivity
{
    protected static function bootAction()
    {

        static::updated(function ($model) {

            (new StoreActivityLog())->store(model: $model, title: class_basename(self::class) . ' Updated', activity: 'Update');
        });

        static::deleted(function ($model) {

            (new StoreActivityLog())->store(model: $model, title: class_basename(self::class) . ' Deleted', activity: 'Delete');
        });

        // static::creating(function ($model) {
        //     $model->created_by = Auth::user()?->id;
        // });


        if (!app()->runningInConsole()) {
            static::created(function ($model) {
                (new StoreActivityLog())->store(model: $model, title: class_basename(self::class) . ' Created', activity: 'Create');
            });
        }
    }
}
