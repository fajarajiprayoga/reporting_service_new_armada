<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ReportController extends Controller{
    public function actionSkrb(){
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'Hello World !');
        
        $writer = new Xlsx($spreadsheet);
        // $writer->save('hello world.xlsx');
        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="tes.xlsx"'); 
        $writer->save('php://output');	// download file 
    }
}