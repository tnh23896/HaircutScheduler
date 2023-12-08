<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RevuneStatistic implements FromArray, WithHeadings, WithStyles
{
	protected $revuneStatic;

	public function __construct(array $revuneStatic)
	{
		$this->revuneStatic = $revuneStatic;
	}

	public function array(): array
{
	return $this->revuneStatic;
}

	public function headings(): array
	{
		return ['Tháng', 'Doanh thu'];
	}

	public function styles(Worksheet $sheet)
	{
		// Apply styles to the rows
		$lastRow = count($this->revuneStatic) + 1; // Add 1 to include the header row
		$sheet->getStyle('A1:B' . $lastRow)->applyFromArray([
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			],
		]);

		// Set background color for the title row
		$sheet->getStyle('A1:B1')->applyFromArray([
			'fill' => [
				'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
				'startColor' => ['rgb' => 'FFA07A'], // Light Salmon color
			],
			'font' => [
				'color' => ['rgb' => 'FFFFFF'], // White font color
			],
		]);

		// Set column width
		$sheet->getColumnDimension('A')->setWidth(10);
		$sheet->getColumnDimension('B')->setWidth(15);

		// ... existing styles code ...

    // Set cell format for 'Doanh thu' column
    $sheet->getStyle('B2:B' . (count($this->revuneStatic) + 1))->getNumberFormat()->setFormatCode('#,##0');

   $doanhThuColumnRange = 'B2:B' . $lastRow;

    $sheet->getStyle($doanhThuColumnRange)->getNumberFormat()->setFormatCode('#,##0');

    // Loop through each cell in the 'Doanh thu' column and set to 0 if empty
    for ($row = 2; $row <= $lastRow; $row++) {
        $cellValue = $sheet->getCell('B' . $row)->getValue();
        if ($cellValue === null || $cellValue === '') {
            $sheet->setCellValue('B' . $row, 0);
        }
    }

    return [
        1 => ['font' => ['bold' => true]],
    ];

	}
}
