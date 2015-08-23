<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Tier;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class TierController extends Controller
{

    /**
    * @Route("/getTiers", name="get_tiers")
    * @Method("GET")
    */
    public function getTiersAction()
    {
      $em = $this->getDoctrine()->getManager();
      $query = $em->createQuery(
        'SELECT t
        FROM AppBundle:Tier t'
      );

      $tiers = $query->getArrayResult();

      $response = json_encode($tiers);
      return new Response($response, 200, array(
          'Content-Type' => 'application/json'
      ));
    }

    /**
     * @Route("/createTier")
     * @Method("POST")
     * @Template()
     */
    public function createTierAction(Request $request)
    {
      $tier = new Tier();
      $tier->setName($request->get('tier_name'));
      $tier->setPrice($request->get('tier_price'));
      $tier->setSizeRange($request->get('tier_range'));
      $tier->setMinRange($request->get('tier_min_range'));
      $tier->setMaxRange($request->get('tier_max_range'));

      $em = $this->getDoctrine()->getManager();

      $em->persist($tier);
      $em->flush();

      $response = new JsonResponse(
          array(
              'message' => 'Success!',
          ),
          200
      );

      return $response;
    }

    /**
     * @Route("/removeTier/{id}")
     * @Method("POST")
     * @Template()
     */
    public function removeTierAction($id)
    {
      $em = $this->getDoctrine()->getManager();
      $tier = $em->getRepository('AppBundle:Tier')->find($id);

      if (!$tier) {
        throw $this->createNotFoundException(
          'No tier found for id '.$id
        );
      }

      $em->remove($tier);
      $em->flush();

      $response = new JsonResponse(
          array(
              'message' => 'Success!'
          ),
          200
      );

      return $response;
    }

}
