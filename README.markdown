# Handlebar #

[Mustache][1] is another HTML template engine similar to [Twig][2] and [Smarty][3].

The benefits of Mustache are that it is very simple compared to other template engines and it's platform agnostic.  A Mustache template that works under PHP should also work under other Mustache implementations such as .NET or Python.

bobthecow A.K.A [Justin Hileman][4] wrote the [PHP Mustache implementation][5].

Handlebar is a simple class that extends Justin's Mustache class so it can be used in applications built using the [Kohana][6] V3 framework.

## Getting Started ##

1.	Download the [Handlebar][7] source from github

2.	Download the [Mustache][5] source from github

3.	Extract the source files to separate directories

4.	Copy the **Mustache.php** file into the **handlebar/classes/** folder and rename it to **mustache.php**

5.	Copy the **handlebar** folder into your Kohana **modules** folder.  

	Your directory structure should now look something like this:  

		application/
		modules/
			auth/
			cache/
			codebench/
			database/
			handlebar/
				classes/
				controller/
					handlebar.php
				mustache.php
				handlebar.php
			image/
			oauth/
			pagination/
			unittest/
			userguide/
		system/

6.	Enable the handlebar module in **/application/bootstrap.php**  

		<?php
		
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
				// 'oauth'      => MODPATH.'oauth',      // OAuth authentication
				// 'pagination' => MODPATH.'pagination', // Paging of results
				// 'unittest'   => MODPATH.'unittest',   // Unit testing
				// 'userguide'  => MODPATH.'userguide',  // User guide and API documentation
				'handlebar' => MODPATH.'handlebar'
			));
		
		?> 


## Hello World Example ##

Create the mustache template **/application/views/home.mustache**

Paste in the following markup:

	<html>
		<body>
			<p>{{content}}</p>
		</body>
	</html>


Next we will create the neccessary classes to replace &#123;&#123;content&#125;&#125; with &lsquo;Hello World&rsquo;.

Create the controller class **/application/classes/controller/home.php**

Paste in the following code:  

	<?php defined('SYSPATH') OR die('No direct access allowed.');

	class Controller_Home extends Controller_Handlebar
	{
		public function action_index()
		{
			$this->view = Handlebar::factory('Home');
		}
	}

	?>

Next we need to create our Home View class.  If you don't already have one create a view folder under your application's classes folder like so:

	application/
		classes/
			view/

Create the view class **/application/classes/view/home.php**

Paste in the following code:  

	<?php defined('SYSPATH') OR die('No direct access allowed.');

	class View_Home extends Handlebar
	{
		function before()
		{
			$this->insert_template('home');
		}
	
		function content()
		{
			return 'Hello World!';
		}
	}

?>

Go to **http://localhost/home** and **Hello World!** should hopefully appear.

[1]: http://mustache.github.com/
[2]: http://www.twig-project.org/
[3]: http://www.smarty.net/
[4]: http://justinhileman.com
[5]: https://github.com/bobthecow/mustache.php
[6]: http://kohanaframework.org/
[7]: https://github.com/malkintower/handlebar
