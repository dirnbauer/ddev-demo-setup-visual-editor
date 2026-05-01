<?php

declare(strict_types=1);

namespace StudioMitte\SolrNumberedPagination\EventListener;

use ApacheSolrForTypo3\Solr\Event\Search\BeforeSearchResultIsShownEvent;
use ApacheSolrForTypo3\Solr\Pagination\ResultsPaginator;
use GeorgRinger\NumberedPagination\NumberedPagination;
use TYPO3\CMS\Core\Utility\GeneralUtility;

final class BeforeSearchResultIsShownEventListener
{
    public function __invoke(BeforeSearchResultIsShownEvent $event): void
    {
        $resultSet = $event->getResultSet();
        $currentPage = $event->getCurrentPage();
        $itemsPerPage = $resultSet->getUsedResultsPerPage() ?: 10;
        $maximumNumberOfLinks = $event->getPagination()->getMaxPageNumbers() ?: 10;
        $paginator = GeneralUtility::makeInstance(ResultsPaginator::class, $resultSet, $currentPage, $itemsPerPage);

        $event->setPagination(GeneralUtility::makeInstance(NumberedPagination::class, $paginator, $maximumNumberOfLinks));
    }
}
