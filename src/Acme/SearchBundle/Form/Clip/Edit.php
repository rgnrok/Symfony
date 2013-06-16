<?php

namespace Acme\SearchBundle\Form\Clip;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Url;
//use Symfony\Component\Validator\Constraints\;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Edit extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Youtube Search
        $builder->add('url', 'text', array(
            'label' => 'YouTube url:',
            'required' => true,
        ));

        //Start time
        $builder->add('time_start', 'integer', array(
            'label' => 'Time start:',
            'required' => true,
        ));

        //End time
        $builder->add('time_end', 'integer', array(
            'label' => 'Time end:',
            'required' => true,
        ));

        //Tag
        $builder->add('tags', 'entity', array(
            'class' => 'AcmeSearchBundle:Tag',
            'property' => 'name',
        ));

        //Description
        $builder->add('description', 'text', array(
            'label' => 'Description:',
            'attr' => array('class' => 'span9'),
        ));

        parent::buildForm($builder, $options);
    }

    public function getName()
    {
        return 'clip_edit';
    }

    public function getDefaultOptions(array $options)
    {
        $collectionConstraint = new Collection(array(
            'url' => array(new NotNull(), new Url()),
            'time_start' => array(new NotNull(), ),
            'time_end' => new NotNull(),
            'tags' => new NotNull(),
        ));

        return array(
            'validation_constraint' => $collectionConstraint
        );
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\SearchBundle\Entity\Clip',
        ));
    }


}

