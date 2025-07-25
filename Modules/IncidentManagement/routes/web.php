<?php

use Illuminate\Support\Facades\Route;
use Modules\IncidentManagement\Http\Controllers\IncidentManagementController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('incidentmanagements', IncidentManagementController::class)->names('incidentmanagement');
});
