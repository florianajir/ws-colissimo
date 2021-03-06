<?php

namespace WSColissimo\WSColiPosteLetterReturnService\Request\ValueObject;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * Parcel
 *
 * @author Nicolas Cabot <n.cabot@lexik.fr>
 */
class Parcel
{
    /**
     * @var string
     */
    public $insuranceRange;

    /**
     * @var string
     */
    public $recommendationLevel;

    /**
     * @var float
     */
    public $weight;

    /**
     * @var boolean
     */
    public $horsGabarit;

    /**
     * Constructor
     *
     * @param float $weight
     */
    public function __construct($weight = null)
    {
        $this->weight         = $weight;
        $this->insuranceRange = '00';

        $this->horsGabarit    = false;
    }

    /**
     * Get insuranceRange
     *
     * @return string
     */
    public function getInsuranceRange()
    {
        return $this->insuranceRange;
    }

    /**
     * Set insuranceRange
     *
     * @param string $insuranceRange
     *
     * @return self
     */
    public function setInsuranceRange($insuranceRange)
    {
        $this->insuranceRange = $insuranceRange;

        return $this;
    }

    /**
     * Get recommendationLevel
     *
     * @return string
     */
    public function getRecommendationLevel()
    {
        return $this->recommendationLevel;
    }

    /**
     * Set recommandationLevel
     *
     * @param string $recommendationLevel
     *
     * @return self
     */
    public function setRecommendationLevel($recommendationLevel)
    {
        $this->recommendationLevel = $recommendationLevel;

        return $this;
    }

    /**
     * Get weight
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set weight
     *
     * @param float $weight
     *
     * @return self
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get horsGabarit
     *
     * @return boolean
     */
    public function getHorsGabarit()
    {
        return $this->horsGabarit;
    }

    /**
     * Set horsGabarit
     *
     * @param boolean $horsGabarit
     *
     * @return self
     */
    public function setHorsGabarit($horsGabarit)
    {
        $this->horsGabarit = $horsGabarit;

        return $this;
    }

    /**
     * Add validation rules
     *
     * @param ClassMetadata $metadata
     */
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('insuranceRange', new Assert\Regex(array('pattern' => '/^[0-9]{2}$/')));

        $metadata->addPropertyConstraint('recommendationLevel', new Assert\Blank());
        $metadata->addPropertyConstraint('recommendationLevel', new Assert\Regex(array('pattern' => '/^[a-zA-Z0-9]+$/')));

        $metadata->addPropertyConstraint('weight', new Assert\NotBlank());
        $metadata->addPropertyConstraint('weight', new Assert\Type(array('type' => 'float')));
        $metadata->addPropertyConstraint('weight', new Assert\Range(array('min' => 0.01, 'max' => 30)));

        $metadata->addPropertyConstraint('horsGabarit', new Assert\Type(array('type' => 'boolean')));
    }

    /**
     * Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        $method = 'get' . ucfirst($name);

        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }
}
