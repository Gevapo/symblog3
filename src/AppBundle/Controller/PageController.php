<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 12/04/2016
 * Time: 12:17
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Enquiry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="homepage")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        /* find all */
        //$blogs = $em->getRepository('AppBundle:Blog')->findAll();

        /*  */
        //$query = $em->createQuery('SELECT b FROM AppBundle:Blog b ORDER BY b.created DESC');
        //$blogs = $query->getResult();

        /*  */
        $blogs = $em->getRepository('AppBundle:Blog')
                    ->getLatestBlogs();

        return $this->render('pages/index.html.twig', array(
            'blogs' => $blogs
        ));
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
     * @Method({"GET", "POST"})
     */
    public function contactAction(Request $request)
    {
        $enquiry = new Enquiry();
        $form = $this->createForm('AppBundle\Form\EnquiryType', $enquiry);
        $form->handleRequest($request);


        if ($form->isValid()) {
            echo 'email ' . $enquiry->getEmail();
            /* send mail */
            $message = \Swift_Message::newInstance()
                ->setSubject('Contact enquiry from symblog')
                ->setFrom('noreply@gevapo.be')
        //        ->setTo(array('geert@geertvanpoucke.be', $enquiry->getEmail()))
                ->setTo($enquiry->getEmail())
                ->setBCC('geert@geertvanpoucke.be')
                ->setBody(
                    $this->renderView(
                        'pages/contactEmail.txt.twig',
                        array(
                            'enquiry' => $enquiry
                        )
                    ), 'text/html'
                );
            $this->get('mailer')->send($message);


            /* redirect */
            return $this->redirectToRoute('contact');
        }

        return $this->render('pages/contact.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}