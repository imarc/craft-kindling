Kindling
========

This is a Craft CMS plugin and Twig extension that provides some convienent
logic for use building Craft sites.

This plugin has been updated for Craft 3. For Craft 2, please see the craft2
branch and the latest 1.x release.

Array Extension
---------------

This adds the twig filter `intersect` which simply maps to PHP's own
[array_intersect](http://php.net/manual/en/function.array-intersect.php).

Cookie Extension
----------------

This add the twig function `cookie` which can be used to get or a set a cookie.
If only one parameter is passed, it returns the value of the cookie if it
exists. If more two or more parameters are passed, it has the same parameters
as PHP's own [setcookie()](http://php.net/manual/en/function.setcookie.php).

Linkify
---------------------

A simple twig filter, `linkify`, that searches a text string for URLs and email addresses and wraps them in anchor tags. Remember to use the |raw filer on the output.

`{{ linkify(tweet.text)|raw }}`

Inflection Extension
--------------------

This add two twig filters: `numberToWords` and `inflect`.

`numberToWords` converts an integer between -999,999,999,999,999,999,999 and
999,999,999,999,999,999,999 into words. It has an optional argument if you'd
like the result to be an adjective.

```
{{ 432|numberToWords }} returns "four hundred and thirty-two"
{{ 101|numberToWords(true) }} returns "one hundred and first"
```

`inflect` Takes at least one argument, a formatter expression, that it uses
with the quantity. It will try to pluralize the expression automatically, but
you can also provide a second argument to specify the exact plural format.

In the formatter expression, you can use `%d`, `%n`, `%a`, or `%%`:

* `%d` is replaced with the original number.
* `%n` is replaced with the original number written out as words.
* `%a` is replaced with the original number written out as an adjective.
* `%%` is a literal %.

```
{{ 1|inflect('cat') }}, {{ 2|inflect('cat') }} returns "cat, cats"
{{ 1|inflect('%n fish') }}, {{ 2|inflect('%d grass') }} returns "one fish, 2 grasses"
{{ 3|inflect('%d person') }} returns "3 people"
{{ 22|inflect('%a day', '%a day') }} returns "twenty-second day"
```


Pathing Variables Extension
---------------------------

Path classes provides a way to get classes generated from the current request path. For example,

* URL: **http://example.com/about/company/news**
    * Using the function: `{{ path_classes() }}` outputs `about company news`
    * Using the variable: `path_classes` returns an array containing `about`, `company`, and `news`

Both of these are designed to be manipulated. The `path_classes` function takes
two arguments, `$offset` and `$length`, and uses
[array_slice](http://php.net/manual/en/function.array-slice.php) under the hood:

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

Lastly, if you store whatever you're going to use for the body ID to a
variable, this is probably easier to work with than `craft.request.path` to
check whether you're on that page (to say, hide/show parts of a twig layout.)


Wrap Embeds Extension
---------------------

This is a simple twig filter, `wrapembeds`, that searches for `<iframe>` tags
in the text passed in, and if it finds any, wraps them in a div with a class of
"responsive_video".


Template Variables
---------

setFlash provides a template alias to call craft()->userSession->setFlash($name, $value). Useful for passing variables to the following page, for example passing the page number from the list to detail view

`{% setFlash('page', 3) %}`

executionTime Outputs the time required for the server to execute the page output

`{{ craft.kindling.executionTime }}` 