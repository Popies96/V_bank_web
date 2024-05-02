<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\CompteRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;


#[Route('/user')]
class UserController extends AbstractController
{
    private $session;
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository , CompteRepository $compteRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),'comptes' => $compteRepository->findAll(),
        ]);
    }



    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Hash the plain password
            $hashedPassword = $passwordHasher->hashPassword(
                $user,
                $user->getPassword()
            );
            // Set the hashed password to the user entity
            $user->setPassword($hashedPassword);

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }


    #[Route('/{idUser}', name: 'app_user_show', methods: ['GET'])]
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }
    #[Route('/{idUser}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
    {
        // Retrieve $idUser from the session
        $idUser = $this->session->get('user_id');

        // Fetch the user from the database based on $idUser
        $user = $entityManager->getRepository(User::class)->find($idUser);

        // Check if user exists
        if (!$user) {
            throw $this->createNotFoundException('User not found');
        }

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hashedPassword = $passwordHasher->hashPassword($user, $user->getPassword());
        $user->setPassword($hashedPassword);
            $entityManager->flush();

            return $this->redirectToRoute('app_page', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }
/*
    #[Route('/{idUser}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }
*/
    #[Route('/{idUser}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getIdUser(), $request->request->get('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }


    #[Route('/{idUser}/ban', name: 'app_user_ban', methods: ['POST'])]
    public function banUser($idUser, EntityManagerInterface $entityManager): RedirectResponse
    {
        // Fetch the user from the database based on $idUser
        $user = $entityManager->getRepository(User::class)->find($idUser);

        // Check if user exists
        if (!$user) {
            return $this->redirectToRoute('app_user_index'); // Redirect to the index page
        }

        // Check if the user is already banned
        if ($user->getRole() === 'banned') {
            return $this->redirectToRoute('app_user_index'); // Redirect to the index page
        }

        // Ban the user by setting the role to "banned"
        $user->setRole('banned');

        // Persist the changes
        $entityManager->flush();

        return $this->redirectToRoute('app_user_index'); // Redirect to the index page
    }

    #[Route('/{idUser}/unban', name: 'app_user_unban', methods: ['POST'])]
    public function unbanUser($idUser, EntityManagerInterface $entityManager): RedirectResponse
    {
        // Fetch the user from the database based on $idUser
        $user = $entityManager->getRepository(User::class)->find($idUser);

        // Check if user exists
        if (!$user) {
            return $this->redirectToRoute('app_user_index'); // Redirect to the index page
        }

        // Check if the user is already unbanned
        if ($user->getRole() !== 'banned') {
            return $this->redirectToRoute('app_user_index'); // Redirect to the index page
        }

        // Unban the user by setting the role to a different role, assuming 'ROLE_USER'
        $user->setRole('User'); // Change 'User' to whatever is appropriate for your system

        // Persist the changes
        $entityManager->flush();

        return $this->redirectToRoute('app_user_index'); // Redirect to the index page
    }

}
