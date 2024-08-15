<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\EmployeesModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use TCPDF;
class ExportController extends BaseController
{
    public function export()
    {
        $model = new EmployeesModel();
        $employees = $model->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // Set column headers
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nama Depan');
        $sheet->setCellValue('C1', 'Nama Belakang');
        $sheet->setCellValue('D1', 'Alamat');
        $sheet->setCellValue('E1', 'No Telepon');
        $sheet->setCellValue('F1', 'Email');
        $sheet->setCellValue('G1', 'Jabatan');
        $sheet->setCellValue('H1', 'Departemen');
        $sheet->setCellValue('I1', 'Tanggal Bergabung');
        // Populate data
        $row = 2;
        foreach ($employees as $employee) {
            $sheet->setCellValue('A' . $row, $employee['id']);
            $sheet->setCellValue('B' . $row, $employee['first_name']);
            $sheet->setCellValue('C' . $row, $employee['last_name']);
            $sheet->setCellValue('D' . $row, $employee['address']);
            $sheet->setCellValue('E' . $row, $employee['phone_number']);
            $sheet->setCellValue('F' . $row, $employee['email']);
            $sheet->setCellValue('G' . $row, $employee['job_title']);
            $sheet->setCellValue('H' . $row, $employee['department']);
            $sheet->setCellValue('I' . $row, $employee['hire_date']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'employees_' . date('Y-m-d_H-i-s') . '.xlsx';

        // Send the file to the browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    public function exportPdf()
    {
        $model = new EmployeesModel();
        $employees = $model->findAll();

        // Create new PDF document
        $pdf = new TCPDF();
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Company');
        $pdf->SetTitle('Employees Report');
        $pdf->SetHeaderData('', '', 'Employees Report', 'Generated on ' . date('Y-m-d'));
        $pdf->setHeaderFont(['helvetica', '', 12]);
        $pdf->setFooterFont(['helvetica', '', 8]);
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->SetFont('helvetica', '', 12);

        // Add a page
        $pdf->AddPage();

        // Set table header
        $html = '
            <h2>Employees Report</h2>
            <table border="1" cellpadding="4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Job Title</th>
                        <th>Department</th>
                        <th>Hire Date</th>
                    </tr>
                </thead>
                <tbody>';

        // Add table rows
        foreach ($employees as $employee) {


            $html .= '
                <tr>
                    <td>' . htmlspecialchars($employee['id']) . '</td>
                    <td>' . htmlspecialchars($employee['first_name']) . '</td>
                    <td>' . htmlspecialchars($employee['last_name']) . '</td>
                    <td>' . htmlspecialchars($employee['address']) . '</td>
                    <td>' . htmlspecialchars($employee['phone_number']) . '</td>
                    <td>' . htmlspecialchars($employee['email']) . '</td>
                    <td>' . htmlspecialchars($employee['job_title']) . '</td>
                    <td>' . htmlspecialchars($employee['department']) . '</td>
                    <td>' . htmlspecialchars($employee['hire_date']) . '</td>
                </tr>';
        }

        $html .= '
                </tbody>
            </table>';

        // Output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        // Close and output PDF document
        $filename = 'employees_report_' . date('Y-m-d_H-i-s') . '.pdf';
        $pdf->Output($filename, 'I');
        exit;
    }
}
