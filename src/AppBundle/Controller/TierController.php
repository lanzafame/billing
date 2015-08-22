<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Tier;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

$encoders = array(new JsonEncoder());
$normalizers = array(new ObjectNormalizer());

$serializer = new Serializer($normalizers, $encoders);

class TierController extends Controller
{

    /**
    * @Route("/getTiers", name="get_tiers")
    * @Method("GET")
    */
    public function getTiersAction()
    {
      // $repository = $this->getDoctrine()
          // ->getRepository('AppBundle:Tier');

      $em = $this->getDoctrine()->getManager();
      $query = $em->createQuery(
        'SELECT t
        FROM AppBundle:Tier t'
      );

      $tiers = $query->getArrayResult();

      // $response = $serializer->serialize($tiers, 'json');
      // $response = new JsonResponse();
      // $response->setData(array('tiers' => $tiers));
      $response = json_encode($tiers);
      // return $response;
      return new Response($response, 200, array(
          'Content-Type' => 'application/json'
      ));

      // return new JsonResponse($tiers);
      // return new Response($response);
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
              'tier' => $tier
          ),
          200
      );

      return $response;
    }

    /**
     * @Route("/removeTier")
     * @Method("POST")
     * @Template()
     */
    public function removeTierAction()
    {

    }

}
