<?php

namespace App\Imports;

use App\Models\Course;
//use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CourseImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        $existingCode = Course::pluck('code')->toArray();
        $newCourses = [];

        //dd($rows);
        
        foreach ($rows as $row) {
            if (in_array($row['code'], $existingCode)) {
                // You can skip this row or log it as duplicate
                continue;
            }

            $newCourses[] = [
                'code' => $row['code'],
                'coursename' => $row['coursename'],
                'credit' => $row['credit'],
            ];

            $existingCode[] = $row['code']; // Add to the array to check duplicates within the Excel file
        }

        // Bulk insert new users to minimize database operations
        Course::insert($newCourses);
    }
}
