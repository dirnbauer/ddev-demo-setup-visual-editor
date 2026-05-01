# TYPO3 Solr Numbered Pagination

Local TYPO3 14 / EXT:solr 14 adaptation of `studiomitte/solr-numbered-pagination`.

The package keeps the upstream event-listener approach: before EXT:solr assigns
search results to Fluid, it replaces the default Solr pagination object with
`GeorgRinger\NumberedPagination\NumberedPagination`.

This project overrides the Solr `Result/Pagination` partial through site
settings:

```yaml
plugin:
  tx_solr:
    view:
      partialRootPath: 'EXT:solr_numbered_pagination/Resources/Private/Partials/'
```

The bundled partial uses shadcn/ui-style pagination classes while keeping
EXT:solr's pagination URL ViewHelper.
