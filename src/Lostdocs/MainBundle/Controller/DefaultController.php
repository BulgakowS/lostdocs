<?php

namespace Lostdocs\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Lostdocs\MainBundle\Entity\Announcement;
use Lostdocs\MainBundle\Form\AnnouncementType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
    
    /**
     * @Route("/announcemetn/new", name="ann_new")
     * @Template()
     */
    public function newAnnAction()
    {
        $em = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        
        $ann = new Announcement();
        $form = $this->createForm(new AnnouncementType(), $ann);
        
        if ( $request->isMethod('POST') && $form->isValid() ) {
            
        }
        
        
        return array(
            'form' => $form->createView()
        );
        
    }
    
}
