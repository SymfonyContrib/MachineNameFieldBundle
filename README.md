**This code is part of the [SymfonyContrib](http://symfonycontrib.com/) community.**

Machine Name Field Bundle
=========================

Symfony2 form field to help with creating machine name fields.

## Installation

### 1. Add the bundle to your composer.json

```
"require": {
    ...
    "symfonycontrib/machinenamefield-bundle": "@stable"
}
```

### 2. Install the bundle using composer

```bash
$ composer update symfonycontrib/machinenamefield-bundle
```

### 3. Add this bundle to your application's kernel:

```php
    new SymfonyContrib\Bundle\MachineNameFieldBundle\MachineNameFieldBundle(),
```

### 4. [optional] Add JavaScript to form pages.

```html
<script src="{{ path('bundles/machinenamefield/js/machine-name.js') }}"></script>
```

## How to Use

### Add form field to a Symfony form

```php
    $builder->add('machineName', 'machine_name');
```

This field, by default, provides 2 fields, a label text field and a name text
field. The data property names can be changed by passing in options to the
form field.

Default machine_name form field custom options:

```php
[
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
]
```

### Form data

By default the field is backed by a provided class:
SymfonyContrib\Bundle\MachineNameFieldBundle\Model\MachineName

This can be changed by passing the data_class option of form field. Setting
data_class to null will use an array or you can set it to another class that
either extends the provided MachineName class or implements the
MachineNameInterface.

### Doctrine

A trait is provided that helps with using the MachineName object on a Doctrine
entity that has separated name and label fields. You can override the trait
functions to customize as needed or use it as a template to do something really
custom.

```php
// Acme/AcmeBundle/Entity/Acme.php

namespace Acme\AcmeBundle\Entity;

use SymfonyContrib\Bundle\MachineNameFieldBundle\Model\MachineName;
use SymfonyContrib\Bundle\MachineNameFieldBundle\Model\Traits\SeparatedPropertiesTrait;

class Acme
{
    use SeparatedPropertiesTrait;

    /** @var string */
    protected $name;

    /** @var string */
    protected $label;

    public function __construct()
    {
        $this->initMachineName();
    }

    // Getters and setters.
}
```

A lifecycle callback is needed as well:

```yml
# Acme/AcmeBundle/Resources/doctrine/Acme
lifecycleCallbacks:
    postLoad:
        - initMachineName
```

** In Doctrine 2.5 which is yet to be released **
Instead of the above separated fields, you can use the MachineName object as an
[Embeddable](http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/tutorials/embeddables.html)

