<?php
 
return [
 
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
 
    "accepted"             => "O :attribute precisa ser aceito.",
    "active_url"           => "O :attribute não é uma URL válida.",
    "after"                => "O :attribute precisa ser uma data posterior a :date.",
    "alpha"                => "O :attribute deve conter apenas letras.",
    "alpha_dash"           => "O :attribute deve conter apenas letras, números e traços.",
    "alpha_num"            => "O :attribute deve conter apenas letras e números.",
    "array"                => "O :attribute deve ser um array.",
    "before"               => "O :attribute deve ser uma data inferior a :date.",
    "between"              => [
        "date"    => "A :attribute deve estar entre :min e :max.",
        "numeric" => "O :attribute deve estar entre :min e :max.",
        "file"    => "O :attribute deve estar entre :min e :max kilobytes.",
        "string"  => "O :attribute deve estar entre :min e :max caracteres.",
        "array"   => "O :attribute deve ter entre :min e :max itens.",
    ],
    "boolean"              => "O campo :attribute precisa ser true ou false.",
    "confirmed"            => "A :attribute confirmação não confere.",
    "date"                 => "O :attribute não é uma data válida.",
    "date_format"          => "O :attribute não condiz com o formato :format.",
    "different"            => "O :attribute e :other precisam ser diferentes.",
    "digits"               => "O :attribute deve ter :digits digitos.",
    "digits_between"       => "O :attribute deve ter entre :min e :max digitos.",
    "email"                => "O :attribute deve ser um endereço válido de e-mail.",
    "filled"               => "O campo :attribute é obrigatório.",
    "exists"               => "A seleção :attribute é inválida.",
    "image"                => "O :attribute deve ser uma imagem.",
    "in"                   => "A seleção :attribute é inválida.",
    "integer"              => "O :attribute deve ser um inteiro.",
    "ip"                   => "O :attribute deve ser um endereço válido de IP.",
    "max"                  => [
        "numeric" => "O :attribute não pode ser maior que :max.",
        "file"    => "O :attribute não pode ser maior que :max kilobytes.",
        "string"  => "O :attribute não pode ser maior que :max caracteres.",
        "array"   => "O :attribute não pode ter mais de :max itens.",
    ],
    "mimes"                => "O :attribute deve ser um arquivo do tipo: :values.",
    "min"                  => [
        "numeric" => "O :attribute deve ter ao menos :min.",
        "file"    => "O :attribute deve ter ao menos :min kilobytes.",
        "string"  => "O :attribute deve ter ao menos :min caracteres.",
        "array"   => "O :attribute deve ter ao menos :min itens.",
    ],
    "not_in"               => "A seleção :attribute é inválida.",
    "numeric"              => "O :attribute deve ser um número.",
    "regex"                => "O formato de :attribute é inválido.",
    "required"             => "O campo :attribute é obrigatório.",
    "required_if"          => "O campo :attribute é obrigatório quando :other é :value.",
    "required_with"        => "O campo :attribute é obrigatório quando :values está presente.",
    "required_with_all"    => "O campo :attribute é obrigatório quando :values estão presentes.",
    "required_without"     => "O campo :attribute é obrigatório quando :values não está presente.",
    "required_without_all" => "O campo :attribute é obrigatório quando nenhum dos :values está presente.",
    "same"                 => ":attribute e :other deve ser iguais.",
    "size"                 => [
        "numeric" => "O :attribute deve ter :size.",
        "file"    => "O :attribute deve ter :size kilobytes.",
        "string"  => "O :attribute deve ter :size characters.",
        "array"   => "O :attribute deve conter :size itens.",
    ],
    "unique"               => "O :attribute já foi utilizado.",
    "url"                  => "O formato de :attribute é inválido.",
    "timezone"             => "O :attribute deve ser uma zona válida.",
 
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */
 
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    
    "before_date" => "A :attribute deve vir antes da :before",
    "after_date"  => "A :attribute deve vir depois de :after",
 
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */
 
    'attributes' => [],
 
];
