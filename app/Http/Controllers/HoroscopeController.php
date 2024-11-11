<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horoscope;
use App\Services\HoroscopeService;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class HoroscopeController extends Controller
{

    public function __construct(public HoroscopeService $horoscopeService){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Horoscope::first());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function update(Request $request)
    {
        // Validar los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'content' => 'required|string',
            'published' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif' // Validación para la imagen opcional
        ]);

        // Verificar si hay errores en la validación
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'request' => $request->all(),
                'title' => $request->get('title')
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        // Llamar al servicio para actualizar el horóscopo
        try {
            $updatedHoroscope = $this->horoscopeService->updateHoroscope($request->all());

            return response()->json([
                'message' => 'Horóscopo actualizado exitosamente',
                'data' => $updatedHoroscope
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar el horóscopo',
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
