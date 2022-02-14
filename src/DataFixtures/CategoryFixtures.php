<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Cocur\Slugify\Slugify;

class CategoryFixtures extends Fixture
{
    public const CATEGORIES = [
        [
            "name" => 'Dieu',
        ],
        [
            "name" => 'Dieu primordiale',
        ],
        [
            "name" => 'Titan',
        ],
        [
            "name" => 'Heros',
        ],
        [
            "name" => 'Creature',
        ],

    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::CATEGORIES as $category) {
            $categoryEntity = new Category();
            $slug = new Slugify();
            $categoryEntity->setSlug($slug->slugify($category["name"]));
            $categoryEntity->setName($category["name"]);
            $manager->persist($categoryEntity);
        }

        $manager->flush();
    }
    
}
