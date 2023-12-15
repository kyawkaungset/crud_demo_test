<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public function query()
    {
        return Student::query();
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Gender',
            'Created_at'
        ];
    }

    public function map($student): array
    {
        return [
            $student->id,
            $student->name,
            $student->gender,
            dateFormat($student->gender),
        ];
    }

    public function fields(): array
    {
        return [
            'id',
            'name',
            'gender',
            'created_at',
        ];
    }
}
