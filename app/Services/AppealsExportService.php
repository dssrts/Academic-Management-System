<?php

namespace App\Services;

use App\Models\Appeal;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AppealsExportService
{
    public function export(array $selectedIds)
    {
        $appeals = Appeal::whereIn('id', $selectedIds)->get(['student_id', 'subject', 'message', 'filepath', 'viewed', 'created_at']);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // Set the headings
        $sheet->setCellValue('A1', 'Student ID');
        $sheet->setCellValue('B1', 'Subject');
        $sheet->setCellValue('C1', 'Message');
        $sheet->setCellValue('D1', 'Filepath');
        $sheet->setCellValue('E1', 'Viewed');
        $sheet->setCellValue('F1', 'Created At');

        // Populate the data
        $row = 2;
        foreach ($appeals as $appeal) {
            $sheet->setCellValue('A' . $row, $appeal->student_id);
            $sheet->setCellValue('B' . $row, $appeal->subject);
            $sheet->setCellValue('C' . $row, $appeal->message);
            $sheet->setCellValue('D' . $row, $appeal->filepath);
            $sheet->setCellValue('E' . $row, $appeal->viewed);
            $sheet->setCellValue('F' . $row, $appeal->created_at);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'appeals.xlsx';
        $filePath = storage_path('app/' . $fileName);

        $writer->save($filePath);

        return $fileName;
    }
}
