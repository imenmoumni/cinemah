<?php
namespace App\Form;

use App\Data\SearchData;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class SearchForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('q', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => [

                    'placeholder' => 'rechercher'
                ]

            ])

            ->add('category', EntityType::class, [
                'label'    => false,
                'required' => false,
            
                'class'    => Category::class,
                'expanded' => true,
                'multiple' => true,
                'attr'     =>["class" => "cat"]

            ]);
           
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'Data_class' => SearchData::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix(){
        return '';     }
}