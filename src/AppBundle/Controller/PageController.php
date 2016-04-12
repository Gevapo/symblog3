<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 12/04/2016
 * Time: 12:17
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="homepage")
     * @Method("GET")
     */
    public function indexAction()
    {
        return $this->render('pages/index.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/about", name="about")
     */
    public function aboutAction()
    {
        return $this->render('pages/about.html.twig');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/contact", name="contact")
     */
    public function contactAction()
    {
        return $this->render('pages/contact.html.twig');
    }
}