<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AppController extends Controller
{
    /**
     * @Route("/app", name="app")
     */
    public function index()
    {
        return $this->render('app/ex.html.twig', [
            'data' => ['name' => 'Robin'],
        ]);
    }

    public function home()
    {
        return $this->render('app/home.html.twig', [
            'data' => ['name' => 'Robin'],
        ]);
    }

    public function profil()
    {
        return $this->render('app/profil.html.twig', [
            'data' => ['name' => 'Robin'],
        ]);
    }

    public function postit()
    {
        return $this->render('app/postit.html.twig');
    }

    public function courses()
    {
        return $this->render('app/courses.html.twig');
    }

    public function finances()
    {
        return $this->render('app/finances.html.twig');
    }

    public function taches()
    {
        return $this->render('app/taches.html.twig');
    }

    public function connexion()
    {
        return $this->render('app/connexion.html.twig');
    }

    public function base()
    {
        return $this->render('base.html.twig');
    }
}
