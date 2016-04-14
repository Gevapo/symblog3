<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 13/04/2016
 * Time: 17:23
 */

namespace AppBundle\Controller;


use AppBundle\AppBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{


    /**
     * @Route("/show/{id}", name="show_blog")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $blog = $em->getRepository('AppBundle:Blog')->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post');
        }

        return $this->render('pages/show.html.twig', array(
            'blog' => $blog
        ));
    }

}