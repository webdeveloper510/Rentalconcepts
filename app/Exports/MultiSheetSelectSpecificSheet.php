<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets ;

class MultiSheetSelectSpecificSheet implements WithMultipleSheets 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $date;
    protected $selctedloc;

    public function __construct($date, $selctedloc)
    {
        $this->date = $date;
        $this->selctedloc  = $selctedloc;
    }
    public function sheets(): array
    {
        return [
            '1' => new ViewExporter($this->date,$this->selctedloc),
            '2' => new RatioExport($this->date,$this->selctedloc),
            '3' => new YeartodateExport($this->date,$this->selctedloc),
        ];
    }
}
