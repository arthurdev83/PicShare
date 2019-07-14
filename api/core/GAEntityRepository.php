<?php

use Doctrine\ORM\EntityRepository;

class GAEntityRepository extends EntityRepository
{
	protected $alias;
	protected $qb;

	public function count() {
		$qb = $this->QBCount();

		return $qb->getQuery()->getSingleScalarResult();
	}

	protected function getQB($alias = null)
	{
		if ($this->qb === null || $alias != null)
		{
			if ($alias == null)
			{
				$alias = $this->alias;
			}
			$this->qb = $this->createQueryBuilder($alias);		
		}
		return $this->qb;
	}

	protected function resetQB()
	{
		$this->qb = null;
	}

	protected function QBPaginate($offset, $take) {
		$this->qb->setFirstResult($offset);
        $this->qb->setMaxResults($take);

        return $this->qb;
	}

	protected function QBCount() {
		$qb = $this->getQB();
		$qb->select('count('. $this->alias .'.id)');
        return $this->qb;	
	}
}
