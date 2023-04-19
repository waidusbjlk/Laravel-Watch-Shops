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

    'accepted' => ' :attribute должен быть принят.',
    'accepted_if' => ' :attribute должен быть принят, когда :other равно :value.',
    'active_url' => ' :attribute недействительный URL-адрес.',
    'after' => ' :attribute mustбыть датой после :date.',
    'after_or_equal' => 'attribute должна быть датой после или равной :date.',
    'alpha' => ' :attribute должен содержать только буквы.',
    'alpha_dash' => ' :attribute должен содержать только буквы, цифры, дефисы и символы подчеркивания.',
    'alpha_num' => ' :attribute должен содержать только буквы и цифры.',
    'array' => ' :attributeдолжен быть массивом.',
    'before' => ' :attribute должна быть датой до :date.',
    'before_or_equal' => ' :attribute должна быть датой до или равной :date.',
    'between' => [
        'array' => ' :attribute должно быть между :min и :max элементами.',
        'file' => ' :attribute должен быть между :min и :max килобайтами.',
        'numeric' => ' :attribute должно быть между :min и :max.',
        'string' => ' :attribute должно быть между символами :min и :max.',
    ],
    'boolean' => ' :attribute поле должно быть истинным или ложным.',
    'confirmed' => ' :attribute подтверждение не совпадает.',
    'current_password' => 'Вы неправильно написали пароль',
    'date' => ' :attribute недопустимая дата.',
    'date_equals' => ' :attribute должна быть дата, равная :date.',
    'date_format' => ' :attribute не соответствует формату :format.',
    'declined' => ' :attribute должен быть отклонен.',
    'declined_if' => ' :attribute must be declined when :other is :value.',
    'different' => ' :attribute and :other must be different.',
    'digits' => ' :attribute must be :digits digits.',
    'digits_between' => ' :attribute must be between :min and :max digits.',
    'dimensions' => ' :attribute имеет недопустимые размеры изображения.',
    'distinct' => ' :attribute field has a duplicate value.',
    'doesnt_end_with' => ' :attribute may not end with one of the following: :values.',
    'doesnt_start_with' => ' :attribute may not start with one of the following: :values.',
    'email' => ' :attribute Вы некорректно написали e-mail адреса!',
    'ends_with' => ' :attribute must end with one of the following: :values.',
    'enum' => ' selected :attribute является недействительным.',
    'exists' => ' selected :attribute является недействительным.',
    'file' => ' :attribute должен быть файл.',
    'filled' => ' :attribute поле должно иметь значение.',
    'gt' => [
        'array' => ' :attribute должно быть больше, чем :value элементов.',
        'file' => 'attribute должно быть больше :value килобайт.',
        'numeric' => ' :attribute must be greater than :value.',
        'string' => ' :attribute должно быть больше символов :value.',
    ],
    'gte' => [
        'array' => ' :attribute должны иметь элементы :value или более.',
        'file' => ' :attribute должен быть больше или равен :value килобайт.',
        'numeric' => ' :attribute должно быть больше или равно :value.',
        'string' => ' :attribute должно быть больше или равно :value символов.',
    ],
    'image' => ' :attribute должно быть изображение.',
    'in' => ' selected :attribute является недействительным.',
    'in_array' => ' :attribute поле не существует в :other.',
    'integer' => ' :attribute должно быть целым числом.',
    'ip' => ' :attribute должен быть действительным IP-адресом.',
    'ipv4' => ' :attribute должен быть действительным адресом IPv4.',
    'ipv6' => ' :attribute должен быть действительным адресом IPv6.',
    'json' => ' :attribute must be a valid JSON string.',
    'lt' => [
        'array' => ' :attribute должно быть меньше, чем :value элементов.',
        'file' => ' :attribute должен быть меньше :value килобайт.',
        'numeric' => ' :attribute должно быть меньше :value.',
        'string' => ' :attribute должно быть меньше символов :value.',
    ],
    'lte' => [
        'array' => ' :attribute не должно быть более :value элементов.',
        'file' => ' :attribute должен быть меньше или равен :value килобайт.',
        'numeric' => ' :attribute должно быть меньше или равно :value.',
        'string' => ' :attribute должно быть меньше или равно :value символов.',
    ],
    'mac_address' => ' :attribute должен быть действительным MAC-адресом.',
    'max' => [
        'array' => ' :attribute не должно быть более :max элементов.',
        'file' => ' :attribute не должен превышать :max килобайт.',
        'numeric' => ' :attribute не должно быть больше :max.',
        'string' => ' :attribute не должен превышать :max символов.',
    ],
    'max_digits' => ' :attribute не должен содержать более :max цифр.',
    'mimes' => ' :attribute должен быть файлом типа: :values.',
    'mimetypes' => ' :attribute должен быть файлом типа: :values.',
    'min' => [
        'array' => ' :attribute должно быть не менее :min элементов.',
        'file' => ' :attribute должен быть не менее :min килобайт.',
        'numeric' => ' :attribute должно быть не менее :min.',
        'string' => ' :attribute должно быть не менее :min символов.',
    ],
    'min_digits' => ' :attribute должно быть не менее :min цифр.',
    'multiple_of' => ' :attribute должно быть кратно :value.',
    'not_in' => ' selected :attribute is invalid.',
    'not_regex' => ' :attribute формат недействителен.',
    'numeric' => ' :attribute должно быть числом.',
    'password' => [
        'letters' => ' :attribute должен содержать хотя бы одну букву.',
        'mixed' => ' :attribute должен содержать хотя бы одну заглавную и одну строчную букву.',
        'numbers' => ' :attribute должен содержать хотя бы одно число.',
        'symbols' => ' :attribute должен содержать хотя бы один символ.',
        'uncompromised' => ' given :attribute оказалось в утечке данных. Пожалуйста, выберите другой :attribute.',
    ],
    'present' => ' :attribute поле должно присутствовать.',
    'prohibited' => ' :attribute поле запрещено.',
    'prohibited_if' => ':attribute поле запрещено, когда :other равно :value.',
    'prohibited_unless' => ' :attribute поле запрещено, если только :other не находится в :values.',
    'prohibits' => ' :attribute поле запрещает присутствие :other.',
    'regex' => ' :attribute формат недействителен.',
    'required' => ' :attribute Поле, обязательное для заполнения.',
    'required_array_keys' => ' :attribute поле должно содержать записи для: :values.',
    'required_if' => ' :attribute Поле обязательно, если :other равно :value.',
    'required_if_accepted' => ' :attribute Поле обязательно, когда принимается :other.',
    'required_unless' => ' :attribute поле обязательно, если только :other не находится в :values.',
    'required_with' => ' :attribute поле обязательно, когда присутствует :values.',
    'required_with_all' => ' :attribute Поле обязательно, когда присутствуют :values.',
    'required_without' => ' :attribute Поле обязательно, если :values отсутствует.',
    'required_without_all' => ' :attribute поле является обязательным, если ни одно из значений :value не присутствует.',
    'same' => ' :attribute и :other должны совпадать.',
    'size' => [
        'array' => ' :attribute должен содержать элементы :size.',
        'file' => ' :attribute должно быть :size килобайт.',
        'numeric' => ' :attribute должно быть: размер.',
        'string' => ' :attribute должно быть :size символов.',
    ],
    'starts_with' => ' :attribute должен начинаться с одного из следующих: :values.',
    'string' => ' :attribute должна быть строка.',
    'timezone' => ' :attribute должен быть допустимым часовым поясом.',
    'unique' => ' :attribute уже занят.',
    'uploaded' => ' :attribute не удалось загрузить.',
    'url' => ' :attribute должен быть действительным URL.',
    'uuid' => ' :attribute должен быть допустимым UUID.',

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

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
