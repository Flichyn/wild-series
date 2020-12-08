<?php

namespace App\Controller;

use App\Entity\Episode;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/episodes", name="episode_")
 */
class EpisodeController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $episodes = $this->getDoctrine()
            ->getRepository(Episode::class)
            ->findAll();

        return $this->render('episode/index.html.twig', [
            'episodes' => $episodes,
        ]);
    }

    /**
     * @Route("/show/{id}", requirements={"id"="\d+"}, methods={"GET"}, name="show")
     */
    public function show(int $id): Response
    {
        $episode = $this->getDoctrine()
            ->getRepository(Episode::class)
            ->findOneBy(['id' => $id]);

        if (!$episode) {
            throw $this->createNotFoundException(
                'No episode with id : ' . $id . ' found in episode\'s table.'
            );
        }
        return $this->render('episode/show.html.twig', [
            'episode' => $episode,
        ]);
    }
}
