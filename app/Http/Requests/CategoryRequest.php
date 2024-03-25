<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'name' => 'required|string|max:100|unique:categories,name',
            // Para ignorar el registro tratado en el UNIQUE:
            //  - Si se recibe $ID como parámetro, entonces, $this->id
            //  - Si se recibe $CATEGORY como parámetro, entonces, $this->category->id
            'name' => 'required|string|max:100|unique:categories,name,' . $this->category->id,
            // 'name' => 'unique:table,column,except,id'
            /*
                table, el nombre de la tabla.
                column, el nombre de la columna implicada.
                except, el ID que debe ser ignorado.
                id, para especificar el nombre de la columna ID de la tabla si es que no tiene el nombre predeterminado de "id", por ejemplo, habría que especificarlo si fuera "category_id".
            */
            /*
                Otra forma de aplicarlo el IGNORE del registro en el caso del UPDATE es con el empleo del objeto Rule:
                'name' => [ 'required', 'string', 'max:100', Rule::unique('categories')->ignore($this->id) ],

                'name' => 'required|string|max:100|unique:' . AppointmentStatus::class,

                'name' => 'required|string|max:100|unique:' . AppointmentStatus::class . ',name,' . $this->id,
            */
        ];
    }

    // Estableciendo MENSAJES personalizados
    public function messages(): array
    {
        return [
            'name.unique' => __('The Category NAME already exists.'),
        ];
    }
}
