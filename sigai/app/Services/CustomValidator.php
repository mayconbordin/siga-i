<?php namespace App\Services;

use Illuminate\Validation\Validator;

use Carbon\Carbon;

class CustomValidator extends Validator
{
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

    protected function getDateFormat($attribute)
    {
        $format = null;
        
        foreach ($this->rules[$attribute] as $rule) {
            $params = explode(":", $rule);
            
            if ($params[0] == 'date_format') {
                $format = $params[1];
            }
        }
        
        return $format;
    }
    
    public function validateBeforeDate($attribute, $value, $parameters)
    {
        if (sizeof($parameters) != 1) {
            return false;
        }
        
        $format = $this->getDateFormat($attribute);

        $beforeField  = $parameters[0];
        $beforeValue  = $this->data[$beforeField];
        $beforeFormat = $this->getDateFormat($beforeField);
        
        $thisDate   = Carbon::createFromFormat($format, $value);
        $beforeDate = Carbon::createFromFormat($beforeFormat, $beforeValue);
        
        return $thisDate->lt($beforeDate);
    }
    
    public function replaceBeforeDate($message, $attribute, $rule, $parameters)
    {
        return str_replace(':before', str_replace("_", " ", $parameters[0]), $message);
    }
    
    public function validateAfterDate($attribute, $value, $parameters)
    {
        if (sizeof($parameters) != 1) {
            return false;
        }
        
        $format = $this->getDateFormat($attribute);

        $afterField  = $parameters[0];
        $afterValue  = $this->data[$afterField];
        $afterFormat = $this->getDateFormat($afterField);
        
        $thisDate   = Carbon::createFromFormat($format, $value);
        $afterDate = Carbon::createFromFormat($afterFormat, $afterValue);
        
        return $thisDate->gt($afterDate);
    }
    
    public function replaceAfterDate($message, $attribute, $rule, $parameters)
    {
        return str_replace(':after', str_replace("_", " ", $parameters[0]), $message);
    }

} 
