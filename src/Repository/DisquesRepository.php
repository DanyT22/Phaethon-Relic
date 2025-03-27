<?php

namespace App\Repository;

use App\Entity\Disques;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Disques>
 */
class DisquesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Disques::class);
    }

    public function findUserDisquesByEmplacement(User $user, int $emplacement): array
    {
        return $this->createQueryBuilder('d')
            ->join('App\Entity\DisquesObtenu', 'do', 'WITH', 'd.id = do.disque')
            ->where('do.user = :user')
            ->andWhere('d.emplacement = :emplacement')
            ->setParameter('user', $user)
            ->setParameter('emplacement', $emplacement)
            ->getQuery()
            ->getResult();
    }


//    /**
//     * @return Disques[] Returns an array of Disques objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Disques
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
