# Installation

1.  Download the [Handlebar][2] source from github

2.  Download the [Mustache][1] source from github

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

6.  Enable the handlebar module in **/application/bootstrap.php**  

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


[1]: https://github.com/bobthecow/mustache.php
[2]: https://github.com/malkintower/handlebar