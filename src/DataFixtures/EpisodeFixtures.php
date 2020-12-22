<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 60; $i++) {
            $episode = new Episode();
            $episode->setTitle($faker->text(20));
            $episode->setNumber(rand(1, 10));
            $episode->setSynopsis($faker->text(300));
            $episode->setSeason($this->getReference('season_' . rand(0, 5)));
            $manager->persist($episode);
            $this->addReference('episode_' . $i, $episode);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [SeasonFixtures::class];
    }
}
