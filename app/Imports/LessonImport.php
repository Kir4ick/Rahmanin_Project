<?php

namespace App\Imports;

use App\Models\Lesson;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class LessonImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $lesson){
            Lesson::create([
                'code' => $lesson[0],
                'name' => $lesson[1]
            ]);
        }
    }
}
