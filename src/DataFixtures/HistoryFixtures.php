<?php

namespace App\DataFixtures;

use App\Entity\Character;
use App\Entity\History;
use App\Entity\StripBoxe;
use Cocur\Slugify\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class HistoryFixtures extends Fixture implements DependentFixtureInterface
{
    public const HISTORIES = [
        [
            "name" => "Naissance du serpent monde",
            "body" => "Né de l'Union de deux dieux Loki (dieu de la malice et de la discorde), et Angrboda (géante de glace) ainsi que ses deux frères Fenrir et Hell. Ils furent tous élevés à Jötunheim, cependant une prophétie prédit que les enfant de cette union causeront le perte des dieux. Ainsi, Odin lui-même décida de jété le serpent encore petit dans l'imensité des océans. Mais malgrès ses efforts, le serpent grandit si vite qu'il finit par se mordre le queue ayant fait le tour du monde de Midgard",
            "pictures" => [
                "https://i.pinimg.com/originals/23/2d/ee/232deec8f561d70e73386ed9ff10d5d7.jpg",
                "https://mysecretlore.files.wordpress.com/2015/12/les-enfants-de-loki.png",
                "https://pbs.twimg.com/media/Dj_imeUWsAEFx33.jpg",
                "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDVPUrxh4kkRpHhFCStSTK_PNwXRtHM8cnfw&usqp=CAU",
            ],
            "mainCharacter" => 'Jörmungandr',
        ]
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::HISTORIES as $history) {
            $stripBoxes=explode(".", $history["body"]);
            $mainCharacter = $manager
                ->getRepository(Character::class)
                ->findOneBy(array('Name' => $history['mainCharacter']));
            ;
            $historyEntity = new History();
            $slug = new Slugify();
            $historyEntity->setName($history['name']);
            $historyEntity->setslug($slug->slugify($history['name']));
            $historyEntity->setMainCharacter($mainCharacter);
            $manager->persist($historyEntity);
            $manager->flush();
            $i = 0;
            foreach ($stripBoxes as $stripBoxe) {
                $stripBoxeEntity = new StripBoxe();
                $stripBoxeEntity->setBody($stripBoxe);
                $stripBoxeEntity->setPicture($history["pictures"][$i]);
                $stripBoxeEntity->setHistory($historyEntity);
                $manager->persist($stripBoxeEntity);
                $manager->flush();
                $i++;
            }
        }
    }
    public function getDependencies()
    {
        return [
            CharacterFixtures::class,
        ];
    }
}
