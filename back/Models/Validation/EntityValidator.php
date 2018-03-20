<?php
namespace Models\Validation;

use Models\Entity\AbstractEntity;
use Models\Validation\Validators\ValidatorInterface;

class EntityValidator
{
    private $errorList = [];
    private $valid;

    /**
     * @return array
     */
    public function getErrorList() : array
    {
        return $this->errorList;
    }

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->valid;
    }

    public function checkEntity(AbstractEntity $entity, array $schema)
    {
        $this->reset();

        foreach($schema as $fieldName => $validateOptions)
        {
            $val = $entity->{'get' . ucfirst($fieldName)}() ?? $entity->$fieldName ?? '';
            foreach($validateOptions as $validatorName => $validatorOptions)
            {
                if(is_int($validatorName))
                {
                    $validatorName    = $validatorOptions;
                    $validatorOptions = [];
                }
                /**
                 * @var ValidatorInterface $validator
                 */
                $validator = new $validatorName($validatorOptions);
                if(!$validator->validate($val))
                {
                    $this->errorList[$fieldName] = $validator->getErrorText();
                    $this->valid                 = false;
                    break;
                }
            }
        }

        return $this->valid;
    }

    public function reset()
    {
        $this->valid = true;
        $this->errorList = [];
    }
}