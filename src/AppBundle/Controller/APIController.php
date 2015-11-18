<?php

namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class APIController
 */
class APIController extends Controller
{
    /**
     * @Route("/api/students", name="api_students")
     */
    public function studentsAction()
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
