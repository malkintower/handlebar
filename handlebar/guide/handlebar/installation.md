# Installation

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
