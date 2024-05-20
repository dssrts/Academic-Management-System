<?php
namespace App\Services;

use App\Models\Faculty;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class FacultiesExportService
{
    public function export(array $selectedIds)
    {
        // Use eager loading to include the related College data
        $faculties = Faculty::with('college')->whereIn('id', $selectedIds)->get([
            'college_id', 'first_name', 'middle_name', 'last_name', 'created_at'
        ]);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // Set the headings
        $sheet->setCellValue('A1', 'College Title');
        $sheet->setCellValue('B1', 'First Name');
        $sheet->setCellValue('C1', 'Middle Name');
        $sheet->setCellValue('D1', 'Last Name');
        $sheet->setCellValue('E1', 'Created At');

        // Populate the data
        $row = 2;
        foreach ($faculties as $faculty) {
            $sheet->setCellValue('A' . $row, $faculty->college->Title); // Fetch the Title column from the related College model
            $sheet->setCellValue('B' . $row, $faculty->first_name);
            $sheet->setCellValue('C' . $row, $faculty->middle_name);
            $sheet->setCellValue('D' . $row, $faculty->last_name);
            $sheet->setCellValue('E' . $row, $faculty->created_at);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'faculties.xlsx';
        $filePath = storage_path('app/' . $fileName);

        $writer->save($filePath);

        return $fileName;
    }
}
