<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/product', name: 'product-')]
class ProductController extends AbstractController
{
    #[Route('/all', name: 'all')]
    public function all(ProductRepository $product_repository): Response
    {
        $products = $product_repository->findAll();

        return $this->render('product/index.html.twig', ['products' => $products]);
    }
    
    #[Route('/add', name: 'add')]
    public function add()
    {
        // $product = new Product();
        // $product->setName('Novi proizvod');
        // $product->setPrice(25000);
        // $product->setSlug('novi-proizvod');

        // $product_repository->add($product);

        // return new Response("Successfully saved new product with id: " . $product->getId());
        return $this->render('product/add.html.twig');
    }

    #[Route('/edit/{id}', name: 'edit')]
    public function one_product(ProductRepository $product_repository, int $id): Response
    {
        $product = $product_repository->findOneBy(['id' => $id]);

        return $this->render('product/edit.html.twig', ['product' => $product]);
    }


    #[Route('/delete/{id}', name: 'delete')]
    public function delete($id, ProductRepository $product_repository)
    {
        $product = $product_repository->find($id);

        if($product == null)
            throw $this->createNotFoundException('Product not found.');

        $product_repository->remove($product);

        return new Response("Successfully deleted product with id: " . $id . "!");
    }
}