<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    /**
     * Determine si le User est autorisé à faire la request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Determine si le User est autorisé à faire la request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
          'title' => 'required',
          /* ====>>>>>> attention réévalution du upload_max_filesize à 8M dans le php.ini car sinon message erreur LE FICHIER IMAGE n'A PU etre TELEVERSE <<<<<<<==== */
          'image' => 'nullable|image|max:7000',
          'place' => 'required',
          'location' => 'required',
          'description' => 'required',
          'date_start' => 'date|required',
          'date_end' => 'date|required',
          'price' => 'nullable|decimal:0,2',
          'map' => 'required',
          'video_link' => 'nullable'
        ];
    }
}
