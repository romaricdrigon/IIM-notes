<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ExamController
 */
class ExamController extends Controller
{
    /**
     * @Route("/api/students", name="api_students")
     */
    public function studentApiAction()
    {
        $students = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Student')
            ->findAll();

        $json = $this->get('jms_serializer')->serialize($students, 'json');

        return new Response($json, 200, [
            'Content-Type' => 'application/json'
        ]);
    }
}
