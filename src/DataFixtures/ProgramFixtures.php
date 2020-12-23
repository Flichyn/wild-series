<?php


namespace App\DataFixtures;


use App\Entity\Program;
use App\Service\Slugify;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROGRAMS = [
        'Walking Dead' => [
            'summary' => 'Le policier Rick Grimes se réveille après un long coma. Il découvre avec effarement que le
            monde, ravagé par une épidémie, est envahi par les morts-vivants.',
            'category' => 'categorie_4',
        ],
        'The Haunting Of Hill House' => [
            'summary' => 'Plusieurs frères et sœurs qui, enfants, ont grandi dans la demeure qui allait devenir la
            maison hantée la plus célèbre des États-Unis, sont contraints de se réunir pour finalement affronter les
            fantômes de leur passé.',
            'category' => 'categorie_4',
        ],
        'American Horror Story' => [
            'summary' => 'A chaque saison, son histoire. American Horror Story nous embarque dans des récits à la fois
            poignants et cauchemardesques, mêlant la peur, le gore et le politiquement correct.',
            'category' => 'categorie_4',
        ],
        'Love Death And Robots' => [
            'summary' => 'Un yaourt susceptible, des soldats lycanthropes, des robots déchaînés, des monstres-poubelles,
             des chasseurs de primes cyborgs, des araignées extraterrestres et des démons assoiffés de sang : tout ce
             beau monde est réuni dans 18 courts métrages animés déconseillés aux âmes sensibles.',
            'category' => 'categorie_4',
        ],
        'Penny Dreadful' => [
            'summary' => 'Dans le Londres ancien, Vanessa Ives, une jeune femme puissante aux pouvoirs hypnotiques,
            allie ses forces à celles de Ethan, un garçon rebelle et violent aux allures de cowboy, et de Sir Malcolm,
            un vieil homme riche aux ressources inépuisables. Ensemble, ils combattent un ennemi inconnu, presque
            invisible, qui ne semble pas humain et qui massacre la population.',
            'category' => 'categorie_4',
        ],
        'Fear The Walking Dead' => [
            'summary' => 'La série se déroule au tout début de l épidémie relatée dans la série mère The Walking Dead
            et se passe dans la ville de Los Angeles, et non à Atlanta. Madison est conseillère dans un lycée de
            Los Angeles. Depuis la mort de son mari, elle élève seule ses deux enfants : Alicia, excellente élève qui
            découvre les premiers émois amoureux, et son grand frère Nick qui a quitté la fac et a sombré dans
            la drogue.',
            'category' => 'categorie_4',
        ],
    ];

    private $slug;

    public function __construct(Slugify $slugify)
    {
        $this->slug = $slugify;
    }

    public function load(ObjectManager $manager)
    {
        $i = 0;
        foreach (self::PROGRAMS as $title => $data) {
            $program = new Program();
            $program->setTitle($title);
            $program->setSlug($this->slug->generate($title));
            $program->setSummary($data['summary']);
            $program->setCategory($this->getReference('category_' . rand(0, 5)));
            $manager->persist($program);
            $this->addReference('program_' . $i, $program);
            $i++;
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [CategoryFixtures::class];
    }
}

//$slug = $slugify->generate($program->getTitle());
//$program->setSlug($slug);
