<?php
/**
 *
 */

namespace SymfonyContrib\Bundle\MachineNameFieldBundle\Model;

interface MachineNameInterface
{
    /**
     * @param string $label
     * @return MachineName
     */
    public function setLabel($label);

    /**
     * @return string
     */
    public function getLabel();

    /**
     * @param string $name
     * @return MachineName
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();
}
