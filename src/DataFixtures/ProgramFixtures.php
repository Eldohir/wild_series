<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    const PROGRAMS = [
        ['Title' => 'Games of Throne', 'Synopsis' => 'Les chaises musicales avec du sexe et du sang', 'Category' => 'category_Aventure',],
        ['Title' => 'The Big Bang Theory', 'Synopsis' => "Une femme et des geeks", 'Category' => 'category_Comedie',],
        ['Title' => 'Attack On Titan', 'Synopsis' => "Des gens et des très grands gens", 'Category' => 'category_Aventure',],
        ['Title' => 'Stranger Things', 'Synopsis' => "Des enfants, des expériences et une BO de ouf", 'Category' => 'category_Horreur',],
        ['Title' => 'Malcolm', 'Synopsis' => "Une fratrie en guerre matricide", 'Category' => 'category_Comedie',],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::PROGRAMS as $keys => $tvshow) {
            $program = new Program();
            $program->setTitle($tvshow['Title']);
            $program->setSynopsis($tvshow['Synopsis']);
            $program->setCategory($this->getReference($tvshow['Category']));
            $manager->persist($program);

            $manager->flush();
        }
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            CategoryFixtures::class,
        ];
    }
}
