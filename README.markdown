# Handlebar


## What is Mustache?

[Mustache](http://mustache.github.com/) is a HTML template engine

Mustache's main strengths are:

- it's much simpler than other template engines such as [Twig](http://www.twig-project.org/) and [Smarty](http://www.smarty.net/) and therefore quicker to learn

- it's implemented in all major web programming languages so Mustache templates can be used on different platforms without amendment

- it forces developers to separate view logic from markup so HTML files are more readable

bobthecow A.K.A [Justin Hileman](http://justinhileman.com) wrote the [PHP Mustache implementation](https://github.com/bobthecow/mustache.php).


## What is Handlebar?

Handlebar is a simple class that extends Justin's Mustache class so it can be used in Kohana applications.  

Handlebar is intended as a replacement for standard Kohana Views.


## Installation

1.  Download the [Handlebar](https://github.com/malkintower/handlebar) source from github and extract the files

2.  Copy the `handlebar` folder into your Kohana `modules` folder.  

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
                    Mustache.php
        image/
        orm/
        unittest/
        userguide/
    system/
    ~~~

3.  Enable the handlebar module in `/application/bootstrap.php`

    ~~~
    /**
     * Enable modules. Modules are referenced by a relative or absolute path.
     */
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
