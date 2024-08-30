<?php

namespace App\Repository;

use App\Entity\EspEtudiant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EspEtudiant>
 *
 * @method EspEtudiant|null find($id, $lockMode = null, $lockVersion = null)
 * @method EspEtudiant|null findOneBy(array $criteria, array $orderBy = null)
 * @method EspEtudiant[]    findAll()
 * @method EspEtudiant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EspEtudiantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EspEtudiant::class);
    }
    public function getEtabOrigineData(): array
    {
        return $this->createQueryBuilder('e')
            ->select('e.etab_origine AS etab_origine, COUNT(e.id_et) AS count')
            ->groupBy('e.etab_origine')
            ->getQuery()
            ->getArrayResult();
    }

    // Method to get gender counts
    public function getGenderCounts(): array
    {
        return $this->createQueryBuilder('e')
            ->select('e.sexe AS sexe, COUNT(e.id_et) AS count')
            ->groupBy('e.sexe')
            ->getQuery()
            ->getArrayResult();
    }

    //    /**
    //     * @return EspEtudiant[] Returns an array of EspEtudiant objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?EspEtudiant
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
