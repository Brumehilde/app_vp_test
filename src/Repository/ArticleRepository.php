<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    // constructeur
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    // Creation de la requete avec le querybuilder pour effectuer le trie par date ici le repository va servire de model pour le MVC

    /**
     * @return Article[] Returns an array of Article objects
     */

    public function filterByDate()
    {
        $qb = $this->createQueryBuilder('a')
            ->addOrderBy('a.date', 'DESC');
        $query = $qb->getQuery();

        return $query->execute();
    }


}
