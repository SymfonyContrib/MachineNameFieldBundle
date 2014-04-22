<?php
/**
 * Basic machine name data object.
 */

namespace SymfonyContrib\Bundle\MachineNameFieldBundle\Model;

use SymfonyContrib\Bundle\MachineNameFieldBundle\Transformer\LabelToMachineNameTransformer;
use SymfonyContrib\Bundle\MachineNameFieldBundle\Transformer\MachineNameTransformerInterface;

class MachineName implements MachineNameInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var MachineNameTransformerInterface
     */
    public $transformer;

    public function __construct($transformer = null)
    {
        $this->transformer = $transformer ?: new LabelToMachineNameTransformer();
    }

    /**
     * @param string $label
     * @return MachineName
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $name
     * @return MachineName
     */
    public function setName($name)
    {
        $this->name = $this->transformer->transform($name);

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
