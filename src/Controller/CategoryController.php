<?php

namespace App\Controller;

use App\Entity\Program;
use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CategoryType;
use Symfony\Component\Routing\Annotation\Route;


    /**
    * @Route("/category", name="category_")
    */

class CategoryController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */

    public function index(ManagerRegistry $managerRegistry): Response
    {
        $categoryRepository = $managerRegistry->getRepository(Category::class);
        $categories = $categoryRepository->findAll();

        return $this->render('category/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
     * The controller for the category add form
     *
     * @Route("/new", name="new")
     */
    public function new(Request $request, CategoryRepository $categoryRepository) : Response
    {
            $category = new Category();
            $form = $this->createForm(CategoryType::class, $category);
            $form->handleRequest($request);

            if ($form->isSubmitted()) {
                $categoryRepository->save($category, true);

                return $this->redirectToRoute('category_index');
            }
        // Render the form
        return $this->render('category/new.html.twig', ["form" => $form->createView()]);
    }

    /**
     * @Route("/{categoryName}", name="show")
     */
    public function show(string $categoryName, ManagerRegistry $managerRegistry): Response
    {
        $categoryRepository = $managerRegistry->getRepository(Category::class);
        $category = $categoryRepository->findOneBy(['name'=>$categoryName]);

        if (!$category) {
            throw $this->createNotFoundException(
                'No category with id : ' .$categoryName. 'found in category\'s table.'
            );
        }
        $programRepository = $managerRegistry->getRepository(Program::class);
        $programs = $programRepository->findBy(
            ['category' => $category],
            ['id' => 'DESC'],
            3
        );

        return $this->render('category/show.html.twig', [
            'category' => $category,
            'programs' => $programs,
        ]);
    }

}
