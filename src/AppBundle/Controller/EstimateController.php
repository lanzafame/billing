<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Estimate;
use AppBundle\Entity\EstimateRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class EstimateController extends Controller
{
    /**
     * @Route("/getEstimate")
	 * @Method("GET")
     * @Template()
     */
    public function getAction()
    {
        return array(
                // ...
            );    }

}
