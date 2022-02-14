<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Mythologie;
use App\Repository\CategoryRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class MythologieFixtures extends Fixture implements DependentFixtureInterface
{
    public const MYTHOLOGIES = [
        [
            'name' => 'Grecque',
            'description' => 'La mythologie grecque, c\'est-à-dire l\'ensemble organisé des mythes provenant de la Grèce antique.',
            'category' => [
                'Dieu',
                'Dieu primordial',
                'Heros',
                'Creature',
                'Titan',
            ],
        ],
        [
            'name' => 'Egyptienne',
            'description' => 'Les Égyptiens de l\'Antiquité ont cherché à interpréter tous les phénomènes qu\'ils pouvaient observer à travers le prisme de croyances séculaires.',
            'category' => [
                'Dieu',
            ],
        ],
        [
            'name' => 'Nordique',
            'description' => 'La mythologie nordique est l\'ensemble des mythes provenant d\'Europe du Nord (plus particulièrement de la Scandinavie).',
            'category' => [
                'Dieu',
                'Heros',
                'Creature',
            ],
        ],
        [
            'name' => 'Biblique',
            'description' => 'Elle est tirée de la Bible.',
            'category' => [
                'Dieu',
                'Heros',
                'Creature',
            ],
        ],
        [
            'name' => 'Celtique',
            'description' => 'La mythologie celtique est constitutive de la religion des Celtes de la Protohistoire/Antiquité.',
            'category' => [
                'Dieu',
                'Creature',
            ],
        ],
        [
            'name' => 'Japonaise',
            'description' => 'La mythologie japonaise (日本神話, Nihon shinwa?) est l\'ensemble des légendes et des mythes du Japon.',
            'category' => [
                'Dieu',
                'Creature',
            ],
        ],
    ];
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        foreach (self::MYTHOLOGIES as $mythology) {
            $mythologyEntity = new Mythologie();
            foreach ($mythology["category"] as $category) {
                $categoryEntity = $manager->getRepository(Category::class)
                        ->findOneBy(['Name' => $category]);
                $mythologyEntity->addCategory($categoryEntity);
            }
            $mythologyEntity->setName($mythology['name']);
            $mythologyEntity->setDescription($mythology['description']);
            $slug = new Slugify();
            $mythologyEntity->setSlug($slug->slugify($mythology['name']));
            $manager->persist($mythologyEntity);
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
