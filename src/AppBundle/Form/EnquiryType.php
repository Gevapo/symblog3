<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 12/04/2016
 * Time: 15:04
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class EnquiryType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('email', EmailType::class)
            ->add('subject', TextType::class)
            ->add('body', TextareaType::class);
    }

    /*
     * One key point to mention here is that the
     * getName method should return a unique identifier.
     */
    public function getName()
    {
        return 'contact';
    }
}