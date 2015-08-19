<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Estimate;
use AppBundle\Entity\Tier;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BillingEstimationController extends Controller
{
  /**
  *  @Route("/form")
  */
  public function newAction()
  {
    $pageTitle = "Billing Estimation";
    $tier1 = new Tier('Tier 1', 1.00, 1000, 1, 1000);
    $tier2 = new Tier('Tier 2', 0.70, 4000, 1001, 5000);
    $tier3 = new Tier('Tier 3', 0.50, 10000, 5001, 15000);
    $tiers = array(
        "tier1" => $tier1,
        "tier2" => $tier2,
        "tier3" => $tier3
    );



    return $this->render(
      'form.html.twig',
      array('tiers' => $tiers,
            'billing' => $pageTitle)
    );
  }
}
