<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class EstimateController extends Controller
{
    /**
     * @Route("/getEstimate")
     * @Template()
     */
    public function getAction()
    {
        return array(
                // ...
            );    }

}
