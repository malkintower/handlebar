# Handlebar


## What is Mustache?

[Mustache][1] is a HTML template engine

Mustache's main strengths are:

- it's much simpler than other template engines such as [Twig][2] and [Smarty][3] and therefore quicker to learn

- it's implemented in all major web programming languages so Mustache templates can be used on different platforms without amendment

- it forces developers to separate view logic from markup so HTML files are more readable

bobthecow A.K.A [Justin Hileman][4] wrote the [PHP Mustache implementation][5].


## What is Handlebar?

Handlebar is a simple class that extends Justin's Mustache class so it can be used in Kohana applications.  

Handlebar is intended as a replacement for standard Kohana Views.


# Installation

1.  Download the [Handlebar][6] source from github

2.  Download the [Mustache][5] source from github

3.  Extract the source files to separate directories

4.  Copy the **Mustache.php** file into the **handlebar/vendor/mustache/** folder and rename it to **mustache.php**

5.  Copy the **handlebar** folder into your Kohana **modules** folder.  

    Your directory structure should now look something like this:  

    ~~~
    application/
    modules/
        auth/
        cache/
        codebench/
        database/
        handlebar/
            classes/
            config/
            guide/
            vendor/
                mustache/
                    mustache.php
        image/
        orm/
        unittest/
        userguide/
    system/
    ~~~

6.  Enable the handlebar module in **/application/bootstrap.php**:

    ~~~
    /* Enable modules. Modules are referenced by a relative or absolute path. */
    Kohana::modules(array(
            // 'auth'       => MODPATH.'auth',       // Basic authentication
            // 'cache'      => MODPATH.'cache',      // Caching with multiple backends
            // 'codebench'  => MODPATH.'codebench',  // Benchmarking tool
            // 'database'   => MODPATH.'database',   // Database access
            // 'image'      => MODPATH.'image',      // Image manipulation
            // 'orm'        => MODPATH.'orm',        // Object Relationship Mapping
            // 'unittest'   => MODPATH.'unittest',   // Unit testing
            // 'userguide'  => MODPATH.'userguide',  // User guide and API documentation
            'handlebar' => MODPATH.'handlebar'
        ));
    ~~~


[1]: http://mustache.github.com/
[2]: http://www.twig-project.org/
[3]: http://www.smarty.net/
[4]: http://justinhileman.com
[5]: https://github.com/bobthecow/mustache.php
[6]: https://github.com/malkintower/handlebar