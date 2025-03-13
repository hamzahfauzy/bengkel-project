<?php

use Core\Database;
use Core\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

if(Request::isMethod('POST'))
{
    $db = new Database;
    $import = $_FILES['file'];
    $allowedTypes = ['application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    if (!in_array($import['type'], $allowedTypes)) {
        return redirectBack(['error'=> 'Silakan unggah file Excel']);
    }
    else
    {
        $fileExtension = pathinfo($import['name'], PATHINFO_EXTENSION);
            
        if (in_array($fileExtension, ['xls', 'xlsx'])) {
            $spreadsheet = IOFactory::load($import['tmp_name']);
            $sheet = $spreadsheet->getActiveSheet();
    
            foreach ($sheet->getRowIterator(2) as $row) {
                $name = $sheet->getCell('B' . $row->getRowIndex())->getFormattedValue();
                $unit = $sheet->getCell('C' . $row->getRowIndex())->getFormattedValue();
                $category_name = $sheet->getCell('D' . $row->getRowIndex())->getFormattedValue();
                $supplier = $sheet->getCell('E' . $row->getRowIndex())->getFormattedValue();
                $price = $sheet->getCell('F' . $row->getRowIndex())->getFormattedValue();

                $category = $db->single('ws_categories', [
                    'name' => $category_name
                ]);

                if(!$category)
                {
                    $category = $db->insert('ws_categories', [
                        'name' => $category_name
                    ]);
                }
                
                $product = $db->insert('ws_products', [
                    'category_id' => $category->id,
                    'name' => $name,
                    'supplier_name' => $supplier,
                    'record_type' => $_POST['record_type'],
                    'unit' => $unit
                ]);

                $db->insert('ws_product_prices', [
                    'product_id' => $product->id,
                    'amount' => (int) $price,
                    'status' => "ACTIVE"
                ]);
            }
        }
    }

    return redirectBack(['success' => 'Import Success']);
}