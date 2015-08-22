<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Tier;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $pageTitle = "Billing Estimation";

        return $this->render(
          'form.html.twig',
          array('billing' => $pageTitle)
        );
    }
}
