<?php

namespace Volcano\VideoStatusBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Collection;

class Search extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('search', 'text', array(
            'label' => 'Search keywords:',
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
            'search' => new NotNull(),
        ));

        return array(
            'validation_constraint' => $collectionConstraint
            );
    }


}

