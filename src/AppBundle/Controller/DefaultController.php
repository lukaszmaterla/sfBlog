<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comment;
use AppBundle\Entity\Post;
use AppBundle\Form\CommentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $qb = $this->getDoctrine()->getRepository('AppBundle:Post')->createQueryBuilder('p')->select('p');

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            20/*limit per page*/
        );

        return $this->render('::base.html.twig', array(
            'posts'=> $pagination
        ));
    }

    /**
     * @Route("/article/{id}", name="post_show")
     * @Template(":Article:show.html.twig")
     */
    public function showAction(Post $post, Request $request)
    {

        $comment = new Comment();
        $comment->setPost($post);

        //$comment->setUser($user);
        $form = $this->createForm(new CommentType(), $comment);
        $form->handleRequest($request);
        if ($form->isValid()&& $form->isSubmitted()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();

            $this->addFlash('success', "Komentarz został dodany");

            return $this->redirectToRoute('post_show', ['id'=>$post->getId()]);

        }
        return [
            'post'=>$post,
            'form'=> $form->createView()
        ];
    }
}
