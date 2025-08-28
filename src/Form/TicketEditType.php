<?php
namespace App\Form;

use App\Entity\Accueil;
use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TicketEditType extends AbstractType
{ //Création des champ du Formulaire Ticket lors de la modification des amin ou du personnel d'agence
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('tick_auteur', TextType::class, [
                'label' => 'Auteur',
                'required' => true,
                'attr' => ['readonly' => true],
            ])

            ->add('tick_date_ouv', DateType::class, [
                'label'   => "Date d'ouverture",
                'widget'  => 'single_text',
                'html5'   => true,
                'input'   => 'datetime',
                'format'  => 'yyyy-MM-dd',
                'required'=> true,
                'attr'    => ['readonly' => true],
            ])

            ->add('tick_description', TextareaType::class, [
                'label' => 'Description',
                'required' => true,
            ])

            ->add('tick_categorie', ChoiceType::class, [
                'label' => 'Catégorie',
                'choices' => [
                    'Incident' => 'Incident',
                    'Panne' => 'Panne',
                    'Evolution' => 'Evolution',
                    'Anomalie' => 'Anomalie',
                    'Information' => 'Information',
                ],
                'required' => true,
            ])

            ->add('tick_status', ChoiceType::class, [
                'label'    => 'Statut',
                'choices'  => [
                    'Nouveau' => 'Nouveau',
                    'Ouvert'  => 'Ouvert',
                    'Résolu'  => 'Résolu',
                    'Fermé'   => 'Fermé',
                ]
            ])

            ->add('tick_responsable', TextType::class, [
                'label' => 'Responsable',
                'required' => false,
            ])

            ->add('tick_date_clo', DateType::class, [
                'label' => 'Date de clôture',
                'widget'  => 'single_text',
                'html5'   => true,
                'required'=> false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
