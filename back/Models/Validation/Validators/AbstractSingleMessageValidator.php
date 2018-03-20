<?php
namespace Models\Validation\Validators;

abstract class AbstractSingleMessageValidator extends AbstractValidator
{
    protected $errorMessageTemplate;

    public function __construct(array $options = [])
    {
        $this->errorMessageTemplate = (require __DIR__ . '/../errorMessages.php')[static::VALIDATOR_ABBR] ?? '';
        parent::__construct($options);
    }

    protected function buildErrorText() {

        return str_replace(
            '{{%' . static::VALIDATOR_ABBR . '%}}',
            $this->value,
            $this->errorMessageTemplate
        );
    }
}