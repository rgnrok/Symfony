<?php

namespace Acme\SearchBundle\Form\Tag;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Url;
use Symfony\Component\Validator\Constraints\Collection;

class Edit extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Name
        $builder->add('name', 'text', array(
            'label' => 'Name:',
            'required' => true,
        ));


        parent::buildForm($builder, $options);
    }

    public function getName()
    {
        return 'form';
    }

    public function getDefaultOptions(array $options)
    {
        $collectionConstraint = new Collection(array(
            'name' => new NotNull(),
        ));

        return array(
            'validation_constraint' => $collectionConstraint
        );
    }


}

