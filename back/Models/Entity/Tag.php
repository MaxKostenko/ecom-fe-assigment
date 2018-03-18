<?php
namespace Models\Entity;

use Models\Traits;

class Tag extends AbstractEntity
{
    use Traits\MagicAttributesTrait;

    /**
     * @var string
     */
    protected $name;
    /**
     * @var int
     */
    protected $weight;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }


}