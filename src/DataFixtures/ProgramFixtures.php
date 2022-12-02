<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    const PROGRAMS = [
        ['Title' => 'Game of Thrones', 'Synopsis' => 'Les chaises musicales avec du sang et du sexe', 'Poster' => 'https://m.media-amazon.com/images/I/91iY86ZIuOL._AC_SL1500_.jpg', 'Category' => 'category_Aventure',],
        ['Title' => 'The Big Bang Theory', 'Synopsis' => "Une blonde et des geeks", 'Poster' => 'https://fr.web.img5.acsta.net/pictures/18/11/06/15/36/0408812.jpg', 'Category' => 'category_Comédie',],
        ['Title' => 'Attack On Titan', 'Synopsis' => "Des gens et des très grands gens", 'Poster' => 'https://m.media-amazon.com/images/M/MV5BNzc5MTczNDQtNDFjNi00ZDU5LWFkNzItOTE1NzQzMzdhNzMxXkEyXkFqcGdeQXVyNTgyNTA4MjM@._V1_.jpg', 'Category' => 'category_Animation',],
        ['Title' => 'Stranger Things', 'Synopsis' => "Des enfants, des expériences et une BO", 'Poster' => 'https://fr.web.img4.acsta.net/pictures/22/05/18/14/31/5186184.jpg', 'Category' => 'category_Horreur',],
        ['Title' => 'Malcolm', 'Synopsis' => "Une fratrie en guerre matricide", 'Poster' => 'https://fr.web.img6.acsta.net/c_310_420/pictures/19/07/04/09/54/2363561.jpg', 'Category' => 'category_Comédie',],
        ['Title' => 'Hunter X Hunter', 'Synopsis' => "Un jeune garçon qui n'a pas eu de père", 'Poster' => 'https://fr.web.img5.acsta.net/pictures/19/08/01/09/52/4803203.jpg', 'Category' => 'category_Animation',],
        ['Title' => 'Lost', 'Synopsis' => "Des pêcheurs perdus sur une île", 'Poster' => 'https://flxt.tmsimg.com/assets/p185013_b_v8_af.jpg', 'Category' => 'category_Aventure',],
        ['Title' => 'Death Note', 'Synopsis' => "Un étudiant, un asocial et un carnet", 'Poster' => 'https://fr.web.img5.acsta.net/pictures/18/01/18/14/35/2024405.jpg', 'Category' => 'category_Animation',],
        ['Title' => 'The Witcher', 'Synopsis' => "Plan à 3 entre un toxico, une petite fille et une trans", 'Poster' => 'https://fr.web.img6.acsta.net/pictures/19/12/12/12/13/2421997.jpg', 'Category' => 'category_Aventure',],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::PROGRAMS as $tvshow) {
            $program = new Program();
            $program->setTitle($tvshow['Title']);
            $program->setSynopsis($tvshow['Synopsis']);
            $program->setPoster($tvshow['Poster']);
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
