<?php

namespace App\Http\Controllers;

use App\Models\status_kamar;
use Illuminate\Http\Request;

class TriggerController extends Controller
{
    public function trigger_kamar($id)
    {
        $model = status_kamar::findOrFail($id);
        return response()->json(['trigger' => $model->trigger]);
    }
}
