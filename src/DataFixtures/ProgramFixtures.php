<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture
{
    public function load(ObjectManager $manager)

    {
        $program = new Program();
        $program->setTitle('Foot');
        $program->setSynopsis('Des zombies envahissent la terre');
        $program->setPoster('hello');
        $program->setCategory($this->getReference('category_Action'));
        $manager->persist($program);
        $manager->flush();


        {
            $program = new Program();
            $program->setTitle('Pikachu');
            $program->setSynopsis('Mouloud mange du porc');
            $program->setPoster('https://www.pokepedia.fr/Fichier:Pikachu-DEPS.png');
            $program->setCategory($this->getReference('category_Action'));
            $manager->persist($program);
            $manager->flush();
        }

        {
            $program = new Program();
            $program->setTitle('Master');
            $program->setSynopsis('Je code every day');
            $program->setPoster('Oxmo');
            $program->setCategory($this->getReference('category_Aventure'));
            $manager->persist($program);
            $manager->flush();
        }



    }



    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}


