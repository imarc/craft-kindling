Kindling
========

This is a Craft CMS plugin and Twig extension that provides some convienent logic for use building Craft sites.


Path Generated Classes and ID
-----------------------------

Path classes provides a way to get classes generated from the current request path. For example,

* URL: **http://example.com/about/company/news**
    * Using the function: `{{ path_classes() }}` outputs `about company news`
    * Using the variable: `path_classes` returns an array containing `about`, `company`, and `news`

Both of these are designed to be manipulated. The `path_classes` function takes two arguments, `$offset` and `$length`, and uses [array_slice](http://php.net/manual/en/function.array-slice.php) under the hood:

* URL: **http://example.com/about/company/news/Big-Announcement**
    * Using the function: `{{ path_classes(1) }}` outputs `company news big-announcement`
    * Using the function: `{{ path_classes(0, 2) }}` outputs `about company`
    * Using the function: `{{ path_classes(0, -1) }}` outputs `about company news`
    * Using the function: `{{ path_classes(-1) }}` outputs `big-announcement`

Both `$offset` and `$length` can be negative (just like array_slice). If you
would rather get and manipulate an array with Twig, you can use `path_classes`
to get back an array, and then use Twig's syntax for array slicing:

* URL: **http://example.com/about/company/news/Big-Announcement**
    * Using the variable: `{{ path_classes|join(', ') }}` outputs `about, company, news, big-announcement`
    * Using the variable: `path_classes[:2]` returns an Array containing `about` and `company`

Lastly, there is also `path_id()`. You can use `path_id` as a variable or a function:

* URL: **http://example.com/about/company/news/Big-Announcement**
    * Using the variable: `{{ path_id }}` outputs `about-company-news-big-announcement`
    * Using the function: `{{ path_id(0, 3) }}` outputs `about-company`
    * Using the function: `{{ path_id(0, -1) }}` outputs `about-company-news`

*But what about the homepage?* Try the `?:` operator.

Putting it all together:

```twig
<body class="{{ path_classes }}" id="{{ path_id(0, 3) ?: 'home' }}">
    ...
</body>
```

Lastly, if you store whatever you're going to use for the body ID to a variable, this is probably easier to work with than `craft.request.path` to check whether you're on that page (to say, hide/show parts of a twig layout.)
