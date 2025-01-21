<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        /** @var User $user */
        $user = $request->user();
        $images = $user->images()->orderBy('created_at', 'desc')->get();

        return response()->json($images, 200);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'path' => 'required|string',
        ]);

        $user = $request->user();

        $user->images()->create([
            'path' => $request->string('path')->value(),
        ]);

        return response()->json(['success' => 'You have successfully uploaded an image.'], 200);
    }

    public function destroy(Request $request): JsonResponse
    {
        $request->validate([
            'path' => 'required|string',
        ]);

        $user = $request->user();
        $image = $user->images()->where('path', $request->string('path')->value())->first();
        $image->delete();

        return response()->json(['success' => 'You have successfully deleted an image.'], 200);
    }
}
