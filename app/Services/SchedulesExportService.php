<?php

namespace App\Services;

use App\Models\Schedule;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SchedulesExportService
{
    public function export(array $selectedIds)
    {
        $schedules = Schedule::whereIn('id', $selectedIds)->get(['building', 'room_number', 'type', 'day', 'time', 'status', 'subject_id', 'created_at']);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // Set the headings
        $sheet->setCellValue('A1', 'Building');
        $sheet->setCellValue('B1', 'Room Number');
        $sheet->setCellValue('C1', 'Type');
        $sheet->setCellValue('D1', 'Day');
        $sheet->setCellValue('E1', 'Time');
        $sheet->setCellValue('F1', 'Status');
        $sheet->setCellValue('G1', 'Subject ID');
        $sheet->setCellValue('H1', 'Created At');

        // Populate the data
        $row = 2;
        foreach ($schedules as $schedule) {
            $sheet->setCellValue('A' . $row, $schedule->building);
            $sheet->setCellValue('B' . $row, $schedule->room_number);
            $sheet->setCellValue('C' . $row, $schedule->type);
            $sheet->setCellValue('D' . $row, $schedule->day);
            $sheet->setCellValue('E' . $row, $schedule->time);
            $sheet->setCellValue('F' . $row, $schedule->status);
            $sheet->setCellValue('G' . $row, $schedule->subject_id);
            $sheet->setCellValue('H' . $row, $schedule->created_at);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'schedules.xlsx';
        $filePath = storage_path('app/' . $fileName);

        $writer->save($filePath);

        return $fileName;
    }
}
