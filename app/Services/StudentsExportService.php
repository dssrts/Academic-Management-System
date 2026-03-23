<?php

namespace App\Services;

use App\Models\Student;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class StudentsExportService
{
    public function export(array $selectedIds)
    {
        $students = Student::whereIn('id', $selectedIds)->get([
            'student_no', 'last_name', 'first_name', 'middle_name', 'biological_sex', 'birthdate',
            'birthdate_city', 'religion', 'civil_status', 'student_type', 'registration_status',
            'year_level', 'college_id', 'department_id', 'academic_year', 'permanent_address',
            'plm_email', 'personal_email', 'mobile_no', 'telephone_no', 'user_id', 'created_at'
        ]);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // Set the headings
        $sheet->setCellValue('A1', 'Student No');
        $sheet->setCellValue('B1', 'Last Name');
        $sheet->setCellValue('C1', 'First Name');
        $sheet->setCellValue('D1', 'Middle Name');
        $sheet->setCellValue('E1', 'Biological Sex');
        $sheet->setCellValue('F1', 'Birthdate');
        $sheet->setCellValue('G1', 'Birthdate City');
        $sheet->setCellValue('H1', 'Religion');
        $sheet->setCellValue('I1', 'Civil Status');
        $sheet->setCellValue('J1', 'Student Type');
        $sheet->setCellValue('K1', 'Registration Status');
        $sheet->setCellValue('L1', 'Year Level');
        $sheet->setCellValue('M1', 'College ID');
        $sheet->setCellValue('N1', 'Department ID');
        $sheet->setCellValue('O1', 'Academic Year');
        $sheet->setCellValue('P1', 'Permanent Address');
        $sheet->setCellValue('Q1', 'PLM Email');
        $sheet->setCellValue('R1', 'Personal Email');
        $sheet->setCellValue('S1', 'Mobile No');
        $sheet->setCellValue('T1', 'Telephone No');
        $sheet->setCellValue('U1', 'User ID');
        $sheet->setCellValue('V1', 'Created At');

        // Populate the data
        $row = 2;
        foreach ($students as $student) {
            $sheet->setCellValue('A' . $row, $student->student_no);
            $sheet->setCellValue('B' . $row, $student->last_name);
            $sheet->setCellValue('C' . $row, $student->first_name);
            $sheet->setCellValue('D' . $row, $student->middle_name);
            $sheet->setCellValue('E' . $row, $student->biological_sex);
            $sheet->setCellValue('F' . $row, $student->birthdate);
            $sheet->setCellValue('G' . $row, $student->birthdate_city);
            $sheet->setCellValue('H' . $row, $student->religion);
            $sheet->setCellValue('I' . $row, $student->civil_status);
            $sheet->setCellValue('J' . $row, $student->student_type);
            $sheet->setCellValue('K' . $row, $student->registration_status);
            $sheet->setCellValue('L' . $row, $student->year_level);
            $sheet->setCellValue('M' . $row, $student->college_id);
            $sheet->setCellValue('N' . $row, $student->department_id);
            $sheet->setCellValue('O' . $row, $student->academic_year);
            $sheet->setCellValue('P' . $row, $student->permanent_address);
            $sheet->setCellValue('Q' . $row, $student->plm_email);
            $sheet->setCellValue('R' . $row, $student->personal_email);
            $sheet->setCellValue('S' . $row, $student->mobile_no);
            $sheet->setCellValue('T' . $row, $student->telephone_no);
            $sheet->setCellValue('U' . $row, $student->user_id);
            $sheet->setCellValue('V' . $row, $student->created_at);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'students.xlsx';
        $filePath = storage_path('app/' . $fileName);

        $writer->save($filePath);

        return $fileName;
    }
}
