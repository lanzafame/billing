<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Estimate;
use AppBundle\Entity\Client;
use AppBundle\Entity\Tier;
use AppBundle\Entity\TierRepository;
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
     * @Route("/getEstimate", name="getEstimate")
     * @Template()
     */
    public function getEstimateAction($client)
    {
	  $em = $this->getDoctrine()->getManager();
	  $tiers = $em->getRepository('AppBundle:Tier')->findTiersOrderedByMinRange();

	  $estimate = new Estimate();
	  $estimate->setRemovedArtefacts($estimate->removedUnits($client->getEstimatedArtefacts(), $client->getDuplicates()));
	  $estimate->setFoldedArtefacts($estimate->foldedUnits($client->getEstimatedArtefacts(), $estimate->getRemovedArtefacts(), $client->getVersions()));
	  $estimate->setTotalArtefacts($estimate->totalUnits($client->getEstimatedArtefacts(), $estimate->getRemovedArtefacts(), $estimate->getFoldedArtefacts()));

	  $maxRangeArr = array();
	  $priceArr = array();
	  for ($i = 0; $i < count($tiers); $i++) {
		array_push($maxRangeArr, $tiers[$i]->getMaxRange());
		array_push($priceArr, $tiers[$i]->getPrice());
	  }

//	  $artefactsIR = array();
//	  for ($i = 0; $i < count($tiers); $i++) {
//		array_push($artefactsIR, $estimate->unitsInTier($estimate->getTotalArtefacts(), $maxRangeArr, $i, count($tiers)));
//	  }

	  $artefactsIR = array();
	  $units = array(
		'total' => $estimate->getTotalArtefacts(),
		'left' => NULL,
		'inTier' => 0,
	  );

	  for ($i = 0; $i < count($tiers); $i++) {
		$units = $estimate->tierify($units, $maxRangeArr[$i]);
		array_push($artefactsIR, $units['inTier']);
	  }


	  $priceIR = array();
	  for ($i = 0; $i < count($tiers); $i++) {
		array_push($priceIR, $estimate->priceForTierPerMonthFunc($artefactsIR[$i], $priceArr[$i]));
	  }

	  $estimate->setArtefactsInRange($artefactsIR);
	  $estimate->setPriceForTierPerMonth($priceIR);
	  $estimate->setPricePerMonth($estimate->pricePerMonthFunc($priceIR));
	  $estimate->setDuCheckSum($estimate->duCheckSumFunc($estimate->getTotalArtefacts(), $artefactsIR));
	  $estimate->setAvgPricePerDrawingPerMonth($estimate->avgPricePerDrawingPerMonthFunc($estimate->getTotalArtefacts(), $estimate->getPricePerMonth()));
	  $estimate->setPricePerAnnum($estimate->pricePerAnnumFunc($estimate->getPricePerMonth()));

      $em = $this->getDoctrine()->getManager();

      $em->persist($estimate);
      $em->flush();


	  $response = new JsonResponse(
		  array(
			  'estimate' => json_encode($estimate),
		  ),
		  200
	  );

	  return $response;
	}

}
