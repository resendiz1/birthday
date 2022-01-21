<?php

namespace App\Imports;

use App\Models\Nombre;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;

class nombresImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Nombre([
            
            'nombre' => $row[0],
            'Area_trabajo' => $row[1],
            'email' => $row[2],
            'felicitado' => $row[3],
            'fecha_nacimiento' => $row[4],
            
        ]);
    }

    public function rules(): array{
        return [
            'email' => Rule::in(['something@grupopabsa.com']),
            '*.email' => Rule::in(['something@grupopabsa.com']),
        ];
    }
}
