<?php

namespace App\Repository;

use App\Entity\QuestionIndustry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method QuestionIndustry|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuestionIndustry|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuestionIndustry[]    findAll()
 * @method QuestionIndustry[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuestionIndustryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, QuestionIndustry::class);
    }

    // /**
    //  * @return QuestionIndustry[] Returns an array of QuestionIndustry objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?QuestionIndustry
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
