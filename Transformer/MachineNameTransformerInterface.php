<?php

namespace SymfonyContrib\Bundle\MachineNameFieldBundle\Transformer;

interface MachineNameTransformerInterface
{
    /**
     * Transform value into machine name string.
     *
     * @param $value
     * @return string
     */
    public function transform($value);
}
