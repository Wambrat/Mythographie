<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Character;
use App\Entity\Mythologie;
use App\Repository\CategoryRepository;
use App\Repository\CharacterRepository;
use App\Repository\MythologieRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CharacterFixtures extends Fixture implements DependentFixtureInterface
{
    public const CHARACTERS = [
        [
            'name' => 'Zeus',
            'description' => 'Dieu de la Foudre et maître de l\'Olympe',
            'picture' => 'https://www.dol-celeb.com/wp-content/uploads/2015/04/zeus.jpg',
            'category' => 'Dieu',
            'mythology' => 'Grecque',
        ],
        [
            'name' => 'Arthémis',
            'description' => 'Déesse de la chasse et de la nature sauvage',
            'picture' => 'http://www.chevreriedartemis.fr/images/artemis_1.jpg',
            'category' => 'Dieu',
            'mythology' => 'Grecque',
        ],
        [
            'name' => 'Arès',
            'description' => 'Dieu de la guerre offensive ',
            'picture' => 'https://static.wikia.nocookie.net/creer-votre-mythologie/images/3/34/9b3780dca496789d1ab19c679d84cfa9.jpg/revision/latest?cb=20200805233823&path-prefix=fr',
            'category' => 'Dieu',
            'mythology' => 'Grecque',
        ],
        [
            'name' => 'Hadès',
            'description' => 'Dieu du royaume des morts',
            'picture' => 'https://www.tigrisleonum.com/wp-content/uploads/2021/09/DMyd6biVoAAfnKB.jpg',
            'category' => 'Dieu',
            'mythology' => 'Grecque',
        ],
        [
            'name' => 'Poséïdon',
            'description' => 'Dieu des mers et océans',
            'picture' => 'https://i.pinimg.com/originals/06/ff/50/06ff50672550a91e2b8afcb3cfac85a1.jpg',
            'category' => 'Dieu',
            'mythology' => 'Grecque',
        ],
        [
            'name' => 'Athéna',
            'description' => 'Déesse de la guerre defensive et de la sagesse',
            'picture' => 'https://nordactu.fr/wp-content/uploads/2021/05/Lhistoire-fascinante-dAthena-deesse-grecque-de-la-sagesse.jpg',
            'category' => 'Dieu',
            'mythology' => 'Grecque',
        ],
        [
            'name' => 'Typhon',
            'description' => 'Le père des monstres le seul ayant conquis l\'Olympe',
            'picture' => 'https://cdn.shopify.com/s/files/1/0076/6987/4778/files/typhon-mythologie-grecque-dragon-naga_b7998197-70c8-483c-b7f8-7d72924d453c.jpg?v=1608335860',
            'category' => 'Creature',
            'mythology' => 'Grecque',
        ],
        [
            'name' => 'Cerbere',
            'description' => 'Le chien gardien de enfer à trois têtes',
            'picture' => 'https://m.media-amazon.com/images/I/71qzN7s0bsL._AC_SX425_.jpg',
            'category' => 'Creature',
            'mythology' => 'Grecque',
        ],
        [
            'name' => 'Achille',
            'description' => 'Le héros légendaire de Grèce ayant pour seule point faible sa cheville',
            'picture' => 'https://i.pinimg.com/236x/3a/e6/e3/3ae6e3944c9a8e9c61eca572a9cbbc6d.jpg',
            'category' => 'Heros',
            'mythology' => 'Grecque',
        ],
        [
            'name' => 'Rê',
            'description' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Re-Horakhty.svg/langfr-180px-Re-Horakhty.svg.png',
            'picture' => 'Dieu du soleil ',
            'category' => 'Dieu',
            'mythology' => 'Egyptienne',
        ],
        [
            'name' => 'Isis',
            'description' => 'Deesse du ciel',
            'picture' => 'https://www.dol-celeb.com/wp-content/uploads/2020/07/isis.jpg',
            'category' => 'Dieu',
            'mythology' => 'Egyptienne',
        ],
        [
            'name' => 'Anubis',
            'description' => 'Dieu de la mort',
            'picture' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6d/Anubis_standing.svg/langfr-250px-Anubis_standing.svg.png',
            'category' => 'Dieu',
            'mythology' => 'Egyptienne',
        ],
        [
            'name' => 'Osiris',
            'description' => 'Dieu Roi du monde',
            'picture' => 'https://mythologica.fr/egypte/pic/osiris.png',
            'category' => 'Dieu',
            'mythology' => 'Egyptienne',
        ],
        [
            'name' => 'Bastet',
            'description' => 'Deesse de la joie du foyer',
            'picture' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Bastet.svg/1200px-Bastet.svg.png',
            'category' => 'Dieu',
            'mythology' => 'Egyptienne',
        ],
        [
            'name' => 'Odin',
            'description' => 'Dieu principal de la mythologie nordique',
            'picture' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Odin_%28Manual_of_Mythology%29.jpg/1200px-Odin_%28Manual_of_Mythology%29.jpg',
            'category' => 'Dieu',
            'mythology' => 'Nordique',
        ],
        [
            'name' => 'Thor',
            'description' => 'Dieu du Tonnerre',
            'picture' => 'https://static.blog4ever.com/2015/01/793370/artfichier_793370_7661821_201804082647356.jpg',
            'category' => 'Dieu',
            'mythology' => 'Nordique',
        ],
        [
            'name' => 'Fenrir',
            'description' => 'Loup geant fils de lokir et de Angrboda',
            'picture' => 'https://cdn.shopify.com/s/files/1/2795/4706/articles/fenrir_700x.png?v=1635170415',
            'category' => 'Creature',
            'mythology' => 'Nordique',
        ],
        [
            'name' => 'Jörmungandr',
            'description' => 'Serpent monde',
            'picture' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-7va8rhXNrladjtXOmHYtAhN5wbLQH69yZpVFSz5RSrp3ZvNuPbuLfIwPg6e5PrzGCzc&usqp=CAU',
            'category' => 'Creature',
            'mythology' => 'Nordique',
        ],
        [
            'name' => 'Hel',
            'description' => 'Deesse des morts',
            'picture' => 'https://cdn.shopify.com/s/files/1/2392/8713/files/deesse-hell.jpg?v=1569514449',
            'category' => 'Dieu',
            'mythology' => 'Nordique',
        ],
        [
            'name' => 'Dieu',
            'description' => 'Createur de la Terre',
            'picture' => 'https://static.cnews.fr/sites/default/files/styles/image_640_360/public/point1.jpg?itok=jGTH8XuS',
            'category' => 'Dieu',
            'mythology' => 'Biblique',
        ],
        [
            'name' => 'Behemoth',
            'description' => 'Une des bête de l\'apocalypse bête à tête de taureau reignant sur la terre',
            'picture' => 'https://static.wikia.nocookie.net/revari/images/b/bb/Behemoth_-_Donnerbehemoth.jpg/revision/latest/top-crop/width/360/height/450?cb=20180106194747&path-prefix=de',
            'category' => 'Creature',
            'mythology' => 'Biblique',
        ],
        [
            'name' => 'Leviathan',
            'description' => 'Une des bête de l\'apocalypse bête reignant sur les mers',
            'picture' => 'http://ekladata.com/k4AsNSh9ieQXYEx1-Azs3RY7bwQ@200x200.jpg',
            'category' => 'Creature',
            'mythology' => 'Biblique',
        ],
        [
            'name' => 'Moïse',
            'description' =>'Prophète ayant sauvé les hébreux de l\'esclavage des egyptiens',
            'picture' => 'https://www.chretiensaujourdhui.com/asset/uploads/2014/11/Moise.jpg',
            'category' => 'Heros',
            'mythology' => 'Biblique',
        ],
        [
            'name' => 'Samson',
            'description' => 'Héros biblique tirant sa puissance d\'un de ses cheveux',
            'picture' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Leighton-Samson-c._1858.jpg/240px-Leighton-Samson-c._1858.jpg',
            'category' => 'Heros',
            'mythology' => 'Biblique',
        ],
        [
            'name' => 'Taranis',
            'description' => 'dieu du ciel',
            'picture' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVGzql7zLtUfx5fJjiVdVwd-39QZZCinPg_g&usqp=CAU',
            'category' => 'Dieu',
            'mythology' => 'Celtique',
        ],
        [
            'name' => 'Esus',
            'description' => 'dieu batisseur',
            'picture' => 'https://static.blog4ever.com/2015/01/793370/artfichier_793370_4485093_201501254637730.jpg',
            'category' => 'Dieu',
            'mythology' => 'Celtique',
        ],
        [
            'name' => 'Fomoires',
            'description' => 'demi-dieu inhumain et d\'une puissance colosal',
            'picture' => 'https://static.blog4ever.com/2008/02/182076/artfichier_182076_5050821_201508131737986.jpg',
            'category' => 'Creature',
            'mythology' => 'Celtique',
        ],
        [
            'name' => 'Banshee',
            'description' => 'Créature fantomatique dont on dit que le crie peut tuer de trouille une vingtaine homme',
            'picture' => 'https://static.wikia.nocookie.net/teenwolf/images/8/89/Banshee.jpg/revision/latest?cb=20130730154245&path-prefix=fr',
            'category' => 'Creature',
            'mythology' => 'Celtique',
        ],
        [
            'name' => 'Dorminus',
            'description' => 'Dieu du printemps chaud',
            'picture' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ef/Dominus_Rincaleus.jpg/220px-Dominus_Rincaleus.jpg',
            'category' => 'Heros',
            'mythology' => 'Celtique',
        ],
        [
            'name' => 'Izanami',
            'description' => 'déesse de la création et de la mort',
            'picture' => 'https://m.media-amazon.com/images/I/714Q-U7IyYL._AC_SY679_.jpg',
            'category' => 'Dieu',
            'mythology' => 'Japonaise',
        ],
        [
            'name' => 'Izanagi',
            'description' => 'Dieu du shintoïsme co-créateur du monde',
            'picture' => 'https://i.pinimg.com/474x/fd/52/39/fd5239432cb1ffe45c0e21da84ba2c1c--japanese-mythology-japanese-folklore.jpg',
            'category' => 'Dieu',
            'mythology' => 'Japonaise',
        ],
        [
            'name' => 'Akabeko',
            'description' => 'une vache rouge batisseuse de temple',
            'picture' => 'https://www.tokyo-smart.com/5199-large_default/akabeko.jpg',
            'category' => 'Creature',
            'mythology' => 'Japonaise',
        ],
        [
            'name' => 'Akurojin-no-hi',
            'description' => 'flamme spectrale du dieu du feu ',
            'picture' => 'https://i.pinimg.com/170x/be/6d/2c/be6d2ce8d2a8dba4e8b84c525357cde2.jpg',
            'category' => 'Creature',
            'mythology' => 'Japonaise',
        ],
        [
            'name' => 'Susanô',
            'description' => 'Dieu des tempètes et des valeurs',
            'picture' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2Cnti0HfAO1K5JrHbE05NFepMIfigMWLOhg&usqp=CAU',
            'category' => 'Dieu',
            'mythology' => 'Japonaise',
        ],
    ];
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        foreach (self::CHARACTERS as $character) {
            $category = $manager
            ->getRepository(Category::class)
            ->findOneBy(array('Name' => $character['category']));
            ;
            $mythology = $manager
                ->getRepository(Mythologie::class)
                ->findOneBy(['name' => $character['mythology']])
            ;
            $characterEntity = new Character();
            $characterEntity->setName($character['name']);
            $characterEntity->setDescription($character['description']);
            $characterEntity->setPicture($character['picture']);
            $characterEntity->setCategory($category);
            $characterEntity->setMythology($mythology);
            $slug = new Slugify();
            $characterEntity->setSlug($slug->slugify($character['name']));

            $manager->persist($characterEntity);
            $manager->flush();
        }
    }    
    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
            MythologieFixtures::class,
        ];
    }
}
