<?php

namespace App\Http\Controllers\V0_5;

use App\Http\Controllers\Controller;
use App\Http\Helpers\PhotoHelper;
use App\Models\Imagen;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        // Solo los users pueden crear la foto
        if ($user && $user->role == 1) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            /**
             * @var Imagen
             */
            $imagenOrig = Imagen::create([
                'id_paciente' => $user->id,
                'url' => 'images/' . $imageName,
            ]);

            if (PhotoHelper::pythonProccess($imagenOrig->url)) {
                return response()->json($imagenOrig, 200);
            }
            return response()->json(['message' => 'Error processing image'], 500);
        }

        return response()->json(['message' => 'No tienes permisos para este enlace'], 405);
    }

    public function listAllOwnPhotos(Request $request){
        $user = Auth::user();

        if ($user && $user->role == 1) {
            $images = Imagen::where('id_paciente', $user->id)->and('id_imagen_original', null)->get();
            return response()->json($images, 200);
        }

        return response()->json(['message' => 'No tienes permisos para este enlace'], 405);
    }

    public function getPhotoDetail(Request $request, $id){
        $user = Auth::user();

        if ($user && $user->role == 1) {

            $image = Imagen::find($id);
            if ($image) {
                $modifiedImage = Imagen::where('id_imagen_original', $id)->first();
                $subImages = $image->subimagenes()->get();

                return response()->json([
                    'image' => $image,
                    'modified_image' => $modifiedImage,
                    'sub_images' => $subImages
                ], 200);
            }
            return response()->json(['message' => 'Imagen no encontrada'], 404);
        }

        return response()->json(['message' => 'No tienes permisos para este enlace'], 405);
    }

    public function getChatrooms(Request $request){
        $user = Auth::user();

        if ($user && $user->role == 1){
            $chatrooms = $user->chatrooms;
            return response()->json($chatrooms, 200);
        }
    }
}
