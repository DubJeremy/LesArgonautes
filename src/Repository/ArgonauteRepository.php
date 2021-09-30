<?php

namespace App\Repository;

use App\Entity\Argonaute;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Argonaute|null find($id, $lockMode = null, $lockVersion = null)
 * @method Argonaute|null findOneBy(array $criteria, array $orderBy = null)
 * @method Argonaute[]    findAll()
 * @method Argonaute[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArgonauteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Argonaute::class);
    }

    /**
     * @return Argonaute[] Returns an array of Argonaute objects
     */
    public function findByAll()
    {
        return $this->findBy([], ['id' => 'DESC']);  
    }
}
