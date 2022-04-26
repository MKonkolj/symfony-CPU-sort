<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/product', name: 'product-')]
class ProductController extends AbstractController
{
    #[Route('/all', name: 'all')]
    public function all(ProductRepository $product_repository): Response
    {
        return $this->render('product/index.html.twig', ['products' => $product_repository->findAll()]);
    }
    
    #[Route('/add', name: 'add', methods: ["GET", "POST"])]
    public function add(ProductRepository $product_repository, Request $request) : Response
    {
        if($request->request->get("add-submit") !== null)
        {
            $product = new Product;
            $product->setName($request->request->get("name"));
            $product->setPrice($request->request->get("price"));
            $product->setTeam($request->request->get("team"));
            $product->setPlatform($request->request->get("platform"));

            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->request->get("name")), '-'));
            $product->setSlug($slug);
            $product_repository->add($product);

            return $this->redirectToRoute("product-all");
        }

        return $this->render('product/add.html.twig');
    }

    #[Route('/edit/{id}', name: 'edit', methods: ["GET", "POST"])]
    public function edit(Request $request, ProductRepository $product_repository, string $id): Response
    {
        $product = $product_repository->findOneBy(['id' => $id]);
        
        if($request->request->get("edit-submit") !== null)
        {
            
            $product->setName($request->request->get("name"));
            $product->setPrice($request->request->get("price"));
            $product->setTeam($request->request->get("team"));
            $product->setPlatform($request->request->get("platform"));
            
            $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->request->get("name")), '-'));
            $product->setSlug($slug);
            $product_repository->add($product);
            
            return $this->redirectToRoute("product-all");
        }
        

        if($product == null)
            throw $this->createNotFoundException('Product not found.');

        return $this->render('product/edit.html.twig', ['product' => $product]);
    }


    #[Route('/delete/{id}', name: 'delete')]
    public function delete($id, ProductRepository $product_repository) : Response
    {
        $product = $product_repository->find($id);

        if($product == null)
            throw $this->createNotFoundException('Product not found.');

        $product_repository->remove($product);

        return $this->redirectToRoute("product-all");
    }

    #[Route('/sort', name: 'sort', methods: ["GET"])]
    public function sort(Request $request, ProductRepository $product_repository)
    {
        $sort_type = $request->query->get('sort_type');

        $products = $product_repository->sort($sort_type);

        return $this->json($products);
    }
}
