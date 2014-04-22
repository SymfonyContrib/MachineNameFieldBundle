<?php
/**
 *
 */

namespace SymfonyContrib\Bundle\MachineNameFieldBundle\Model\Traits;

use SymfonyContrib\Bundle\MachineNameFieldBundle\Model\MachineName;
use SymfonyContrib\Bundle\MachineNameFieldBundle\Model\MachineNameInterface;

trait SeparatedPropertiesTrait
{
    /**
     * @var MachineNameInterface
     */
    protected $machineName;

    public function initMachineName()
    {
        $this->machineName = new MachineName();

        $this->updateMachineNameObject();
    }

    public function updateMachineNameObject()
    {
        $this->machineName
            ->setLabel($this->getLabel())
            ->setName($this->getName());
    }

    /**
     * @param MachineNameInterface $machineName
     * @return mixed
     */
    public function setMachineName($machineName)
    {
        $this->machineName = $machineName;
        $this->syncMachineName();

        return $this;
    }

    /**
     * @return MachineNameInterface
     */
    public function getMachineName()
    {
        return $this->machineName;
    }

    /**
     * Sync machine name parts out to separated properties.
     */
    public function syncMachineName()
    {
        $this->syncMachineNameLabel($this->machineName->getLabel());
        $this->syncMachineNameName($this->machineName->getName());
    }

    /**
     * Sync the label that the machine name is derived from to a separate property.
     * Override this function to have full control of setting the label.
     *
     * @param $label
     */
    public function syncMachineNameLabel($label)
    {
        $this->label = $label;
    }

    /**
     * Sync the machine name text to a separate property.
     * Override this function to have full control of setting the name.
     *
     * @param $name
     */
    public function syncMachineNameName($name)
    {
        $this->name = $name;
    }
}
