<?php namespace App\Services;

use Illuminate\Validation\Validator;

use Carbon\Carbon;

class DateValidation extends Validator {

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
