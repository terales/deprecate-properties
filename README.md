## This is a [research code](https://meiert.com/en/blog/20140716/research-and-production/).

# [How to deprecate properties of the God Object?](https://medium.com/web-developer-in-the-translation-industry/how-to-deprecate-properties-of-the-god-object-refactoring-the-blob-pattern-b5a1cbccf1fd)

Consider God Object like this:

```php
<?php
$godObject = new stdClass();
$godObject->db = new db_connection();
// Another 140 properties
```

How can we safely deprecate properties?

1. Remove all property usage manually found.
2. Set up an alert about access to the deprecated property.
3. After a year or two remove the property.
