<?php

/*
 * This file was created by developers working at BitBag
 * Do you need more information about us and what we do? Visit our https://bitbag.io website!
 * We are hiring developers from all over the world. Join us and start your new, exciting adventure and become part of us: https://bitbag.io/career
*/

declare(strict_types=1);

namespace BitBag\SyliusGraphqlPlugin\Doctrine\Repository;

use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Sylius\Component\Core\Model\ShopUserInterface;

final class InvoiceRepository extends EntityRepository implements InvoiceRepositoryInterface
{
    public function createInvoiceByUserQueryBuilder(ShopUserInterface $user): QueryBuilder
    {
        return $this
            ->createQueryBuilder('o')
            ->innerJoin('o.order', 'ord')
            ->where('ord.customer = :customer')
            ->setParameter('customer', $user->getCustomer())
            ;
    }

}
