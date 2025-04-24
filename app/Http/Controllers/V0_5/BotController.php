<?php

namespace App\Http\Controllers\V0_5;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Imagen;
use App\Models\Subimagen;
use Auth;

class BotController extends Controller
{
    public function uploadNewModifiedImage(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:png|max:2048',
            'id' => 'required|integer',
        ]);

        $user = Auth::user();

        if ($user && $user->role == 5 || $user->role == 6) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            // La imagen se puede acceder desde la url completa
            $imagenMod = Imagen::create([
                'id_paciente' => Imagen::find($request->id)->id_paciente,
                'url' => url('images/' . $imageName),
                'id_imagen_original' => $request->original_id,
            ]);

            return response()->json(['message' => 'La imagen se ha subido'], 200);
        }

        return response()->json(['message' => 'No tienes permisos para este enlace'], 405);
    }

    public function uploadSubImage(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:png|max:2048',
            'id' => 'required|integer',
            'objeto' => 'required|string',
            'seguridad' => 'required|float'
        ]);
        $user = Auth::user();

        if ($user && $user->role == 5 || $user->role == 6) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            // La imagen se puede acceder desde la url completa
            $imagenMod = Subimagen::create([
                'id_paciente' => Imagen::find($request->id)->id_paciente,
                'url' => url('images/' . $imageName),
                'id_imagen' => $request->original_id,
                'objeto' => $request->objeto,
                'seguridad' => $request->seguridad,
            ]);

            return response()->json(['message' => 'La imagen se ha subido'], 200);
        }
    }
}
