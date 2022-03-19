<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SomeController extends AbstractController
{
    #[Route('/some', name: 'app_some')]
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/SomeController.php',
        ]);
    }

    #[Route('/some/table', name: 'app_some_table')]
    public function table(): Response
    {
        return $this->json([
            [
                "name" => "John",
                "surname" => "Smith",
                "age" => "32",
                "position" => "Accountant",
                "payment" => "1000"
            ], [
                "name" => "Monica",
                "surname" => "Belucci",
                "age" => "45",
                "position" => "Actress",
                "payment" => "2500"
            ], [
                "name" => "John",
                "surname" => "Paul",
                "age" => "38",
                "position" => "Musician",
                "payment" => "2800"
            ],
        ]);
    }
}
