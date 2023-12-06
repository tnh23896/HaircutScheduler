<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Bill;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class RevuneStatistic implements FromArray , WithHeadings
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

	public  function headings(): array 
	{
		return ['Tháng', 'Doanh thu'  ,  'Doanh thu ca1'  , 'Doanh thu ca2' , 'Doanh thu ca3'];
	}
}
