<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class TierController extends Controller
{
    /**
     * @Route("/newTier")
     * @Template()
     */
    public function newAction()
    {
        return array(
                // ...
            );    }

    /**
     * @Route("/removeTier")
     * @Template()
     */
    public function removeAction()
    {
        return array(
                // ...
            );    }

}
