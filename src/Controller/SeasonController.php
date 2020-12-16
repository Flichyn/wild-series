<?php

namespace App\Controller;

use App\Entity\Season;
use App\Repository\SeasonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/seasons", name="season_")
 */
class SeasonController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param SeasonRepository $seasonRepository
     * @return Response
     */
    public function index(SeasonRepository $seasonRepository): Response
    {
        return $this->render('season/index.html.twig', [
            'seasons' => $seasonRepository->findAll(),
        ]);
    }

    /**
     * @Route("/show/{id}", requirements={"id"="\d+"}, methods={"GET"}, name="show")
     * @param Season $season
     * @return Response
     */
    public function show(Season $season): Response
    {
        $season = $this->getDoctrine()
            ->getRepository(Season::class)
            ->findOneBy(['id' => $id]);

        if (!$season) {
            throw $this->createNotFoundException(
                'No season with id : ' . $id . ' found in season\'s table.'
            );
        }
        return $this->render('season/show.html.twig', [
            'season' => $season,
        ]);
    }
}
