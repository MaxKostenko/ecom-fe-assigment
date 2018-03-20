<?php
namespace Models\Validation\Validators;

abstract class AbstractValidator implements ValidatorInterface
{
    const VALIDATOR_ABBR = self::class;

    protected $options;
    protected $checked = false;
    protected $valid = false;
    protected $value;
    protected $errorMessageTemplate;

    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    abstract protected function checkValidity($value);
    abstract protected function buildErrorText();

    public function getErrorText()
    {
        return $this->isChecked() && !$this->isValid() ? $this->buildErrorText() : NULL;
    }

    public function validate($value) {
        $this->value = $value;
        $this->valid = $this->checkValidity($value);
        $this->checked = true;
        return $this->valid;
    }

    /**
     * @return bool
     */
    public function isChecked()
    {
        return $this->checked;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return $this->valid;
    }
}