<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use App\Entity\Category;
use App\Entity\Character;
use App\Entity\History;
use App\Entity\Mythologie;
use App\Repository\CategoryRepository;
use App\Repository\CharacterRepository;
use App\Repository\HistoryRepository;
use App\Repository\MythologieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MythologyController extends AbstractController
{
    /**
     * @Route("/mythology/", name="mythology", methods="GET")
     */
    public function index(MythologieRepository $mythologieRepository): Response
    {   
        return $this->render('mythology/index.html.twig', [
            'mythologies' => $mythologieRepository->findAll(),
        ]);
    }
    
    /**
     * @Route("/mythology/{slug}", name="categories", methods="GET" )
     */
    public function categories(Mythologie $mythology): Response
    {
        return $this->render('category/index.html.twig', [
            "mythology" => $mythology,
        ]);
    }

    /**
     * @Route("/mythology/{slugMythology}/{slugCategory}", name="category")
     */
    public function category(string $slugMythology, string $slugCategory, CharacterRepository $charRep, MythologieRepository $mythRep, CategoryRepository $cateRep): Response
    {
        $slugMythology = $mythRep->findOneBy(['slug' => $slugMythology]);
        $slugCategory = $cateRep->findOneBy(['slug' => $slugCategory]);
        return $this->render('category/show.html.twig', [
            "characters" => $charRep->findBy(['mythology' => $slugMythology , 'category' => $slugCategory]),
        ]);
    }

    /**
     * @Route("/mythology/{slugMythology}/{slugCategory}/{character}", name="character")
     */
    public function character(string $slugMythology,string $slugCategory, string $character, CharacterRepository $charRep): Response
    {
        $character = $charRep->findOneBy(['slug' => $character]);
        return $this->render('character/index.html.twig', [
            "character" => $character,
        ]);
    }

    /**
     * @Route("/mythology/{slugMythology}/{slugCategory}/{slugCharacter}/{history}", name="history")
     */
    public function history( string $slugMythology, string $slugCategory, string $slugCharacter, string $history, HistoryRepository $histRep): Response
    {
        $history = $histRep->findOneBy(['slug' => $history]);
        return $this->render('history/index.html.twig', [
            "history" => $history,
        ]);
    }
}
