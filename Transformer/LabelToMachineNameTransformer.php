<?php
/**
 * Transform a text string to a machine name string.
 */

namespace SymfonyContrib\Bundle\MachineNameFieldBundle\Transformer;

class LabelToMachineNameTransformer implements MachineNameTransformerInterface
{
    public function transform($value)
    {
        if (!$value) {
            return '';
        }

        // Lowercase.
        $name = strtolower($value);
        // Replace spaces, underscores, and dashes with underscores.
        $name = preg_replace('/(\s|_+|-+)+/', '_', $name);
        // Trim underscores from the ends.
        $name = trim($name, '_');
        // Remove all except alpha-numeric and underscore characters.
        $name = preg_replace('/[^a-z0-9_]+/', '', $name);

        return $name;
    }
}
