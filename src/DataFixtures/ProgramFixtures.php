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
        $program->setSynopsis('Des zombies envahissent la terre. La tradition juive relie leur ascendance aux patriarches Abraham, Isaac et Jacob également appelé Israël. 
        Ils peuplent la Judée et le royaume d/Israël, structurant leur quotidien autour de la Bible hébraïque, laquelle comprend les cinq Livres de la Torah attribués à Moïse, 
        les Livres des prophètes ultérieurs et d/autres écrits.  ');
        $program->setPoster('hello');
        $program->setCategory($this->getReference('category_Action'));
        $manager->persist($program);
        $manager->flush();


        {
            $program = new Program();
            $program->setTitle('Pikachu');
            $program->setSynopsis('Mouloud mange du porc');
            $program->setPoster('Pikachu-DEPS.png');
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


