<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ClientController extends Controller
{
    /**
     * @Route("/newClient")
     * @Template()
     */
    public function newAction()
    {
        return array(
                // ...
            );    }

}
