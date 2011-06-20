# Hello World Tutorial

Create the mustache template `/application/views/home.mustache`

Paste in the following markup:

~~~
<html>
	<body>
		<p>{{content}}</p>
	</body>
</html>
~~~

Next we will create the necessary classes to replace &#123;&#123;content&#125;&#125; with &lsquo;Hello World&rsquo;.

Create the controller class `application/classes/controller/home.php`

Paste in the following code:  

~~~
<?php defined('SYSPATH') OR die('No direct access allowed.');

class Controller_Home extends Controller_Handlebar
{
    public function action_index()
    {
        $this->view = Handlebar::factory('Home');
    }
}
~~~

Next we need to create our Home View class.  If you don't already have one create a view folder under your application's classes folder like so:

~~~
application/
    classes/
        view/
~~~

Create the view class `/application/classes/view/home.php`

Paste in the following code:  

~~~
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
~~~

Go to `http://localhost/home` and **Hello World!** should appear.