<?php
declare(strict_types=1);
require_once 'vendor/autoload.php';
require_once 'config.php';
use \PhpOffice\PhpSpreadsheet\IOFactory;
use \PhpOffice\PhpSpreadsheet\Writer\Xls;
use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use \PhpOffice\PhpSpreadsheet\Cell\Coordinate;

$spreadsheet = IOFactory::load($excel_file_path);
$worksheet = $spreadsheet->getActiveSheet();
$highestRow = $worksheet->getHighestRow();
$highestColumn = $worksheet->getHighestColumn();
$highestColumnIndex = Coordinate::columnIndexFromString($highestColumn);

for ($row = 1; $row <= $highestRow; ++$row) {
    echo 'Working with row №' . $row . PHP_EOL;
    $value = $worksheet->getCellByColumnAndRow($working_column_number, $row)->getValue();
    if (empty($value)) continue;
    $strings = explode("\n", $value);
    foreach ($strings as $key => $string) {
        if (empty($string)) {
            continue;
        }
        $strings[$key] = $lines_prefix . $string . $lines_suffix;
    }
    $new_value = implode("\n", $strings);
    $worksheet->getCellByColumnAndRow($working_column_number, $row)->setValue($new_value);
}

$extension = pathinfo($excel_file_path)['extension'];
$writer = $extension == 'xls' ? new Xls($spreadsheet) : new Xlsx($spreadsheet);
$writer->save($excel_file_path);