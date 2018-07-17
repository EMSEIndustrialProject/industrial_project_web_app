<?php

namespace App\Repository;

use App\Entity\WeightedUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method WeightedUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method WeightedUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method WeightedUser[]    findAll()
 * @method WeightedUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeightedUserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, WeightedUser::class);
    }

//    /**
//     * @return WeightedUser[] Returns an array of WeightedUser objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WeightedUser
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
