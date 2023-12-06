<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ServiceStatistic implements FromArray , WithHeadings
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
		return ['Thời gian', 'Số đơn hoàn thành'  ,  'Số đơn hủy'  , 'Tổng số lượng đơn'];
	}
}
