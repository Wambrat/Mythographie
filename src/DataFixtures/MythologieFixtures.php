<?php

namespace App\DataFixtures;

use App\Entity\Mythologie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MythologieFixtures extends Fixture
{
    public const MYTHOLOGIES = [
        [
            'name' => 'Grecque',
        ],
        [
            'name' => 'Egyptienne',
        ],
        [
            'name' => 'nordique',
        ],
        [
            'name' => 'Biblique',
        ],
        [
            'name' => 'Celtique',
        ],
        [
            'name' => 'Japonaise',
        ],
    ];
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        foreach (self::MYTHOLOGIES as $mythology) {
            $mythologyEntity = new Mythologie();
            $mythologyEntity->setName($mythology['name']);
            $manager->persist($mythologyEntity);
            $manager->flush();
        }
    }
}
