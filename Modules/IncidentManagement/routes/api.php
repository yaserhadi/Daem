<?php

use Illuminate\Support\Facades\Route;
use Modules\IncidentManagement\Http\Controllers\IncidentManagementController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('incidentmanagements', IncidentManagementController::class)->names('incidentmanagement');
});
