<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PowerBIController extends Controller
{
    public function embedConfig(Request $request)
    {
        // Placeholders for environment-provided config
        return response()->json([
            'workspaceId' => env('PBI_WORKSPACE_ID'),
            'reportId' => env('PBI_REPORT_ID'),
            'embedUrl' => env('PBI_EMBED_URL'),
            'accessToken' => env('PBI_EMBED_TOKEN'),
            'expiresAt' => now()->addMinutes(55)->toIso8601String(),
        ]);
    }
}
