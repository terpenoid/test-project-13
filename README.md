# test-project-13

Simple (as possible) API for online store with products and categories.

Categories are organized in a tree structure (with nested sets).

## Routes 

### GET methods

* ``/api/categories`` - return a list (tree) of all *categories* and *products* inside
* ``/api/categories/flat`` - the same, but as flat array
* ``/api/category/{id}`` - return the category by ID and all children as sub-tree
* ``/api/category/{id}/flat`` - the same, but as flat array

* ``/api/products`` - return a list of all *products* with related *categories*
* ``/api/product/{id}`` - return the product by ID and all related *categories*

### POST methods (creating)

* ``/api/category`` - create new *category* instance. (``title`` and ``parend_id`` fields are mandatory)
* ``/api/product`` - create new *product* instance. (``name`` and ``price`` fields are mandatory)

### PUT methods (updating)

* ``/api/category/{id}`` - update existing *category* by ID. (``title`` and ``parend_id`` fields are mandatory)
* ``/api/product/{id}`` - update existing *product* by ID. (``name`` and ``price`` fields are mandatory)

### DELETE methods (deleting)

* ``/api/category/{id}`` - delete existing *category* by ID.
* ``/api/product/{id}`` - delete existing *product* by ID

## Tests

Several examples of tests were added here. A lot can be added also.

You can use ``composer test`` for running the tests. 
