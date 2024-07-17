<?php

namespace App\Http\Controllers;
use PhpOffice\PhpSpreadsheet\IOFactory;

use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function viewExcel()
    {
        // Load the spreadsheet file
        $filePath = storage_path('app/public/your-file.xlsx'); // adjust the path to your file
        $spreadsheet = IOFactory::load($filePath);
        
        // Get the active sheet
        $sheet = $spreadsheet->getActiveSheet();
        
        // Extract the data
        $data = [];
        foreach ($sheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false); // This loops through all cells,
            $rowData = [];
            foreach ($cellIterator as $cell) {
                $rowData[] = $cell->getValue();
            }
            $data[] = $rowData;
        }

        // Return a view and pass the data to it
        return view('excel-view', compact('data'));
    }
}
