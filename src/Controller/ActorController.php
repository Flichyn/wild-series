<?php


namespace App\Controller;

use App\Entity\Actor;
use App\Form\ActorType;
use App\Repository\ActorRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/actors", name="actor_")
 */
class ActorController extends AbstractController
{
    /**
     * @Route("/{id}", requirements={"id"="\d+"}, methods={"GET"}, name="show")
     * @param Actor $actor
     * @return Response
     */
    public function show(Actor $actor): Response
    {
        return $this->render('actor/show.html.twig', [
            'actor' => $actor,
        ]);
    }

    /**
     * The controller for the category add form
     * @Route("/new", name="new")
     * @param Request $request
     * @param Actor $actor
     * @param ActorRepository $actorRepository
     * @return Response
     * @IsGranted("ROLE_ADMIN")
     */
    public function new(Request $request, ActorRepository $actorRepository): Response
    {
        $actor = new Actor();
        $form = $this->createForm(ActorType::class, $actor);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($actor);
            $entityManager->flush();

            $this->addFlash('success', 'The new actor has been added !');

            return $this->redirectToRoute('program_index');
        }
        return $this->render('actor/new.html.twig', [
            'actor' => $actor,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}/edit", name="edit")
     * @param Request $request
     * @param Actor $actor
     * @return Response
     */
    public function edit(Request $request, Actor $actor): Response
    {
        $form = $this->createForm(ActorType::class, $actor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            $this->addFlash('success', 'The actor has been updated !');

            return $this->redirectToRoute('program_index');
        }
        return $this->render('actor/edit.html.twig', [
            'actor' => $actor,
            'form' => $form->createView()
        ]);
    }

}
