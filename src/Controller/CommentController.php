<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Episode;
use App\Entity\Program;
use App\Entity\Season;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    /**
     * @Route("/programs/{program}/seasons/{season}/episodes/{episode}/comments/{comment}", methods={"DELETE"}, name="comment_delete")
     * @ParamConverter("program", class="App\Entity\Program", options={"mapping": {"program": "slug"}})
     * @ParamConverter("season", class="App\Entity\Season", options={"mapping": {"season": "id"}})
     * @ParamConverter("episode", class="App\Entity\Episode", options={"mapping": {"episode": "slug"}})
     * @param Request $request
     * @param Comment $comment
     * @param Program $program
     * @param Season $season
     * @param Episode $episode
     * @return Response
     */
    public function delete(Request $request, Comment $comment, Program $program, Season $season, Episode $episode): Response
    {
        if ($this->isCsrfTokenValid('delete' . $comment->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($comment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('program_index', [
            'program_slug' => $program->getSlug(),
            'season' => $season->getId(),
            'episode_slug' => $episode->getSlug()
        ]);
    }
}
