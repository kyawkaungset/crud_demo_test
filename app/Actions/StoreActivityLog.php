<?php

namespace App\Actions;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Log;

class StoreActivityLog
{
    public function store($model, string $title, string $activity)
    {
        $log            = new ActivityLog();

        $log->createable_type = get_class(auth()->user());
        $log->createable_id = auth()->user()?->id;
        $log->title     = $title;
        $log->activity  = $activity;
        // $log->company_id = auth()->user()->company_id;

        $model->activityLogs()->save($log);

        return $log;
    }
}
