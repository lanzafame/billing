<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ClientController extends Controller
{
    /**
     * @Route("/newClient")
	 * @Method("POST")
     * @Template()
     */
    public function newClientAction(Request $request)
    {
      $client = new Client();
      $client->setEstimatedArtefacts($request->get('total'));
      $client->setDuplicates($request->get('duplicates'));
      $client->setVersions($request->get('versions'));

      $em = $this->getDoctrine()->getManager();

      $em->persist($client);
      $em->flush();

      $response = new JsonResponse(
          array(
              'message' => 'Success!',
          ),
          200
      );

      return $response;
	}

}
