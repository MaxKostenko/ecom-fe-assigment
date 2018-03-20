<?php
namespace Models\Validation\Validators;

class LengthValidator extends AbstractValidator
{
    const VALIDATOR_ABBR = 'length';
    protected $errorMessageTemplate = '';

    public function checkValidity($value)
    {
        if(empty($value))
        {
            return true;
        }

        $messages    = require __DIR__ . '/../errorMessages.php';
        $valueLength = mb_strlen($value);

        if(!is_array($this->options))
        {
            $this->errorMessageTemplate = $messages[static::VALIDATOR_ABBR];

            return $valueLength === (int)$this->options;
        }
        else if(($max = $this->options['max'] ?? 0) && ($valueLength > $max))
        {
            $this->errorMessageTemplate = $messages[static::VALIDATOR_ABBR . ':max'];

            return false;
        }
        else if(($min = $this->options['min'] ?? 0) && ($valueLength < $min))
        {
            $this->errorMessageTemplate = $messages[static::VALIDATOR_ABBR . ':min'];

            return false;
        }

        return true;
    }

    protected function buildErrorText()
    {
        $place_holders = array_map(function ($el) {
            return "{{%{$el}%}}";
        }, [
                static::VALIDATOR_ABBR,
                static::VALIDATOR_ABBR . ':min',
                static::VALIDATOR_ABBR . ':max',
                static::VALIDATOR_ABBR . ':value'
            ]
        );

        $values = [
            $this->options[static::VALIDATOR_ABBR] ?? '',
            $this->options[static::VALIDATOR_ABBR]['min'] ?? '',
            $this->options[static::VALIDATOR_ABBR]['max'] ?? '',
            $this->value,
        ];

        return str_replace($place_holders, $values, $this->errorMessageTemplate);
    }
}