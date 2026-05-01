<?php

declare(strict_types=1);

namespace StudioMitte\SolrNumberedPagination\EventListener;

use ApacheSolrForTypo3\Solr\Event\Search\BeforeSearchResultIsShownEvent;
use ApacheSolrForTypo3\Solr\Pagination\ResultsPagination;
use ApacheSolrForTypo3\Solr\Pagination\ResultsPaginator;
use GeorgRinger\NumberedPagination\NumberedPagination;

final class BeforeSearchResultIsShownEventListener
{
    public function __invoke(BeforeSearchResultIsShownEvent $event): void
    {
        $resultSet = $event->getResultSet();
        $currentPage = $event->getCurrentPage();
        $itemsPerPage = max(1, (int)($resultSet->getUsedResultsPerPage() ?: 10));
        $sourcePagination = $event->getPagination();
        $maximumNumberOfLinks = $sourcePagination instanceof ResultsPagination
            ? max(1, $sourcePagination->getMaxPageNumbers() ?: 10)
            : 10;
        $paginator = new ResultsPaginator($resultSet, $currentPage, $itemsPerPage);

        $event->setPagination(new NumberedPagination($paginator, $maximumNumberOfLinks));
    }
}
