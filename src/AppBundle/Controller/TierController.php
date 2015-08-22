<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Tier;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class TierController extends Controller
{

    /**
    * @Route("/getTiers", name="get_tiers")
    * @Method("GET")
    * @Template()
    */
    public function viewAction(Request $request)
    {
      $response = new JsonResponse(
          array(
              'message' => 'Success!'
          ),
          200
      );

      return $response;
    }
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
