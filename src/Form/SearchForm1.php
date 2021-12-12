<?php
namespace App\Form;

use App\Data\SearchData1;
use App\Entity\Region;
use Doctrine\ORM\Cache\Region as CacheRegion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class SearchForm1 extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('q', TextType::class, ['label' => false,'required' => false, 'attr' => [ 'placeholder' => 'rechercher'],])

            ->add('region', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Region::class,
                'expanded' => true,
                'multiple' => true
            ]);
           
    }





    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'Data_class' => SearchData1::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix(){
        return '';     }
}