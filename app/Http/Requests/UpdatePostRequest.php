<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'content' => 'required',
            /* ====>>>>>> attention réévalution du upload_max_filesize à 8M dans le php.ini car sinon message erreur LE FICHIER IMAGE n'A PU etre TELEVERSE <<<<<<<==== */
            'image' => 'nullable|image|max:7000'
        ];
    }
}
