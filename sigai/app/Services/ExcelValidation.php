<?php namespace App\Services;

use Illuminate\Validation\Validator;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Carbon\Carbon;

class ExcelValidation extends Validator {

    protected $mimeTypes = [
        'application/vnd.ms-office' => 'xls',
        'application/vnd.ms-excel' => 'xls',
        'application/vnd.ms-excel.sheet.binary.macroenabled.12' => 'xlsb',
        'application/vnd.ms-excel.sheet.macroenabled.12' => 'xlsm',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'xlsx',
    ];

    public function validateExcel($attribute, $value, $parameters)
    {
        if ($value instanceof UploadedFile && !$value->isValid()) {
            return false;
        }
        
        $extension = $value->guessExtension();
        $mimeType  = $value->getMimeType();
        
        if ($extension == null) {
            $extension = pathinfo($value->getClientOriginalName(), PATHINFO_EXTENSION);
        }
        
        if (in_array($mimeType, array_keys($this->mimeTypes))) {
            return ($this->mimeTypes[$mimeType] == $extension);
        }
        
        return false;
    }

} 
