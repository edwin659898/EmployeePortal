<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EmployeeExport implements  FromCollection,WithHeadings,WithMapping
{
    use Exportable;

    protected $employees;

    public function __construct($employees)
    {
        $this->employees = $employees;
    }

    public function collection()
    {
        return User::whereKey($this->employees)->get();
    }

    public function map($user) : array {
        return [
            $user->name,
            $user->email,
            $user->department,
            $user->site,
        ] ;
    }

    public function headings():array
    {
        return ["Name", "Email", "Department", "Site"];
    }
}
