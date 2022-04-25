# test-project-13

Simple (as possible) API for online store with products and categories.

Categories are organized in a tree structure (with nested sets).

## Routes 

### Categories

* ``GET: /api/categories`` - return a list (tree) of all *categories* and *products* inside
* ``GET: /api/categories/flat`` - the same, but as flat array
* ``GET: /api/category/{id}`` - return the category by ID with *ancestors* list and all children as sub-tree
* ``GET: /api/category/{id}/flat`` - the same, but as flat array
* ``POST: /api/categories`` - search in *categories* list. (``query`` field is mandatory, "%" symbol is allowed)
* ``POST: /api/category`` - create new *category* instance. (``title`` and ``parend_id`` fields are mandatory)
* ``PUT: /api/category/{id}`` - update existing *category* by ID. (``title`` and ``parend_id`` fields are mandatory)
* ``DELETE: /api/category/{id}`` - delete existing *category* by ID.

### Products

* ``GET: /api/products`` - return a list of all *products* with related *categories*
* ``GET: /api/product/{id}`` - return the product by ID and all related *categories*
* ``POST: /api/products`` - search in *product* list. (``query`` field is mandatory, "%" symbol is allowed)
* ``POST: /api/product`` - create new *product* instance. (``name`` and ``price`` fields are mandatory)
* ``PUT: /api/product/{id}`` - update existing *product* by ID. (``name`` and ``price`` fields are mandatory)
* ``DELETE: /api/product/{id}`` - delete existing *product* by ID

## Tests

Several examples of tests were added here. A lot can be added also.

You can use ``composer test`` for running the tests. 

## Samples

Samples to get the following data are presented in ``examples.txt``
