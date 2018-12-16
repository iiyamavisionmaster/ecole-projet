<?php

namespace marmitonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class LayoutController extends Controller
{
    public function indexAction()
    {
        return $this->render('marmitonBundle:Layout:indexLayout.html.twig');
    }
    public function adminAction()
    {
        return $this->render('marmitonBundle:Layout:adminLayout.html.twig');
    }
}
