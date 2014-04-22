<?php
/**
 *
 */

namespace SymfonyContrib\Bundle\MachineNameFieldBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Form field that makes creates a better UX for creating machine names.
 */
class MachineNameType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $label = $options['label_field'];
        if ($label !== false && is_array($label)) {
            $builder->add($label['field_name'], 'text', $label['options']);
        }
        $name = $options['name_field'];
        if (is_array($name)) {
            $builder->add($name['field_name'], 'text', $name['options']);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars = array_replace($view->vars, [

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'SymfonyContrib\Bundle\MachineNameFieldBundle\Model\MachineName',
            'by_reference' => false,
            'label' => false,
            'label_field' => [
                'field_name' => 'label',
                'options' => [
                    'attr' => [
                        'class' => 'field-label'
                    ],
                ],
            ],
            'name_field' => [
                'field_name' => 'name',
                'options' => [
                    'attr' => [
                        'class' => 'field-name'
                    ],
                ],
            ],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'machine_name';
    }
}
