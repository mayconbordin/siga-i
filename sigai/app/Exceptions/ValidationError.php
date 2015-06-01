<?php namespace App\Exceptions;

class ValidationError extends RepositoryException
{
    protected $errors;
    
    // Redefine the exception so message isn't optional
    public function __construct(array $errors) {
        $this->errors = $errors;
    
        parent::__construct("Validation error", 0, null);
    }
    
    public function getErrors()
    {
        return $this->errors;
    }
    
    public function getErrorsJoined($sep = ',')
    {
        $message = "";
        
        foreach ($this->errors as $field => $errorArray) {
            $message .= implode($sep, $errorArray);
        }

        return $message;
    }
}
