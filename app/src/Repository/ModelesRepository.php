<?php

namespace App\Repository;

use App\Entity\Modeles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Modeles>
 */
class ModelesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Modeles::class);
    }
	
	public function findWithFilesById($id)
	{
		return $this->createQueryBuilder('m')
				->leftJoin('m.modelesFiles', 'mf')
				->addSelect('mf')
				->leftJoin('mf.directusFiles', 'df')
				->addSelect('df')
				->where('m.id = :id')
				->setParameter('id', $id)
				->getQuery()
				->getOneOrNullResult();
	}

    //    /**
    //     * @return Modeles[] Returns an array of Modeles objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('m.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Modeles
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
	
	
}
