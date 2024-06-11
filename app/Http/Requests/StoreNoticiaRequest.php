<?php

// app/Http/Requests/StoreNoticiaRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNoticiaRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Asegúrate de manejar la autorización adecuadamente
    }

    public function rules()
    {
        return [
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'imagen' => 'nullable|image|max:2048',
        ];
    }
}

