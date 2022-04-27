<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Product $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Product $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function sort($sort_type)
    {
        if($sort_type == "price_asc")
        {
            return $this->createQueryBuilder('p')
                ->orderBy('p.price', 'ASC')
                ->getQuery()
                ->getResult();
        }

        if($sort_type == "price_dsc")
        {
            return $this->createQueryBuilder('p')
                    ->orderBy('p.price', 'DESC')
                    ->getQuery()
                    ->getResult();
        }

        if($sort_type == "newest")
        {
            return $this->createQueryBuilder('p')
                    ->orderBy('p.id', 'DESC')
                    ->getQuery()
                    ->getResult();
        }

        // Ovo je zamišljeno da bude query koji će vratiti proizvod sa najvećom cenom odvojeno za AMD i Intel
        // ne radi jer max na radi tako kako meni treba ovde
        if($sort_type == "bla")
        {

            $qb = $this->createQueryBuilder("p");

            // $qb
            //     ->where( 
            //         $qb->expr()->orX(
            //             $qb->expr()->andX(
            //                 $qb->expr()->like("p.team", ":team1"),
            //                 $qb->expr()->max("p.price")
            //             ),
            //             $qb->expr()->andX(
            //                 $qb->expr()->like("p.team", ":team2"),
            //                 $qb->expr()->max("p.price")
            //             )
            //         )
            //     )
            //     ->setParameter("team1", "AMD")
            //     ->setParameter("team2", "Intel");

            return $qb->getQuery()->getResult();
        }
    }

    // /**
    //  * @return Product[] Returns an array of Product objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
