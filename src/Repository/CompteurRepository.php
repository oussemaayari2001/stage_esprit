<?php

namespace App\Repository;

use App\Entity\Compteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Compteur>
 *
 * @method Compteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Compteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Compteur[]    findAll()
 * @method Compteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompteurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Compteur::class);
    }
    public function findByCodeCpt(string $codeCpt): ?Compteur
    {
        return $this->findOneBy(['code_cpt' => $codeCpt]);
    }

    public function incrementTaille(Compteur $compteur): void
    {
        $compteur->setTaille($compteur->getTaille() + 1);
        $compteur->setDateLastModif(new \DateTime());

        // Access the entity manager through getEntityManager()
        $this->getEntityManager()->persist($compteur);
        $this->getEntityManager()->flush();
    }
    public function decrementTaille(Compteur $compteur): void
    {
        if ($compteur->getTaille() > 0) {
            $compteur->setTaille($compteur->getTaille() - 1);
            $compteur->setDateLastModif(new \DateTime());
            $this->getEntityManager()->persist($compteur);
            $this->getEntityManager()->flush();
        }
    }
    //    /**
    //     * @return Compteur[] Returns an array of Compteur objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Compteur
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
