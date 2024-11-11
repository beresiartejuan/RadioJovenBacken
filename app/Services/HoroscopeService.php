<?php

namespace App\Services;

use App\Models\Horoscope;

class HoroscopeService
{
    public function updateHoroscope($data)
    {
        // Buscar el registro que deseas actualizar
        $horoscope = Horoscope::first(); // Cambia esta línea según tu lógica de búsqueda

        if (!$horoscope) {
            throw new \Exception('No se encontró el horóscopo');
        }

        // Actualizar los campos
        $horoscope->title = $data['title'];
        $horoscope->content = $data['content'];
        $horoscope->published = $data['published'] ?? true;

        // Manejar la imagen si se proporciona
        if (isset($data['image']) && is_file($data['image'])) {
            $path = $data['image']->store('images/horoscopes', 'public');
            $horoscope->image = $path;
        }

        $horoscope->save();

        return $horoscope;
    }
}
