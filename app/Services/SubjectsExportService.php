<?php
namespace App\Services;

use App\Models\Subject;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SubjectsExportService
{
    public function export(array $selectedIds)
    {
        // Use eager loading to include related College and Department data
        $subjects = Subject::with(['college', 'department'])
            ->whereIn('id', $selectedIds)
            ->get(['college_id', 'department_id', 'subject_code', 'subject_title', 'created_at']);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // Set the headings
        $sheet->setCellValue('A1', 'College Title');
        $sheet->setCellValue('B1', 'Department Title');
        $sheet->setCellValue('C1', 'Subject Code');
        $sheet->setCellValue('D1', 'Subject Title');
        $sheet->setCellValue('E1', 'Created At');

        // Populate the data
        $row = 2;
        foreach ($subjects as $subject) {
            $sheet->setCellValue('A' . $row, $subject->college->title);
            $sheet->setCellValue('B' . $row, $subject->department->title);
            $sheet->setCellValue('C' . $row, $subject->subject_code);
            $sheet->setCellValue('D' . $row, $subject->subject_title);
            $sheet->setCellValue('E' . $row, $subject->created_at);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'subjects.xlsx';
        $filePath = storage_path('app/' . $fileName);

        $writer->save($filePath);

        return $fileName;
    }
}
