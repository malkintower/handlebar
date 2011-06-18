# Template Example

This example shows how to create two pages (Home and About) that use the same template.

## Mustache Template

Create the mustache file `/application/views/template.mustache`

Paste in the following markup:

~~~
<html>
    <head>
        <title>{{page_title}}</title>
        {{#styles}}
            <link type="text/css" href="{{href}}" rel="stylesheet" media="{{media}}" />
        {{/styles}}        
    </head>
    <body>
        <ul>
            {{#navigation}}
                <li><a href="{{href}}">{{name}}</a></li>
            {{/navigation}}
        </ul>
        {{content}}
    </body>
</html>
~~~

In our template markup we have the following mustache sections:

-   `page_title` and `content` which we will change for each page

-   `styles` and `navigation` - repeating sections that allows us to add multiple elements


## Controller Classes

Next we need to create a controller for each page.

Create the controller class `/application/classes/controller/home.php`

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

Create the controller class `/application/classes/controller/about.php`

~~~
<?php defined('SYSPATH') OR die('No direct access allowed.');
 
class Controller_About extends Controller_Handlebar
{
    public function action_index()
    {
        $this->view = Handlebar::factory('About');
    }
}
~~~

[!!] In real world applications avoid naming your controller class `Controller_Template` if you still want to use modules that use core kohana views (such as the user guide).

## View Classes

Next we need to create three View classes. One for the **Template** and one each for the **Home** and **About** pages.  If you don't already have one, create a view folder under your application's classes folder like so:

~~~
application/
    classes/
        view/
~~~

Create the view class `/application/classes/view/template.php`

~~~
<?php defined('SYSPATH') OR die('No direct access allowed.');

class View_Template extends Handlebar
{
	protected $page_title = 'no page title defined';
    
    protected $content = 'no content defined';

	protected $styles = array(
				array('href' => '/static/css/reset.css', 'media' => 'screen'),
				array('href' => '/static/css/layout.css', 'media' => 'screen')
		);

    protected $navigation = array(
				array('href' => '/home', 'name' => 'Home'),
				array('href' => '/about', 'name' => 'About')
		);

	function before()
	{
		$this->insert_template('template');
	}
}
~~~

Create the view class `/application/classes/view/home.php`

~~~
<?php defined('SYSPATH') OR die('No direct access allowed.');

class View_Home extends View_Template {

	function page_title()
	{
		return 'Home';
	}

	function content()
	{
		return 'This is the Home page';
	}

}
~~~

Create the view class `/application/classes/view/about.php`

~~~
<?php defined('SYSPATH') OR die('No direct access allowed.');

class View_About extends View_Template {

	function page_title()
	{
		return 'About';
	}

	function content()
	{
		return 'This is the About page';
	}

}
~~~

Go to `http://localhost/home` and **This is the Home page** should appear.  You can then use the links at the top of the page to swap between the `Home` and `About` pages.


## Inserting Templates into Templates

So far we've created two pages that use the same markup template.  The content we've inserted is just generic text.  In real world applications content between pages will vary dramatically and will require specific markup to display data.

The Handlebar class contains an `insert_template` method that allows mustache templates to be injected into the base template.

Our `Home` page content is currently displayed between `<body>` tags.  Let's say we want to have our content displayed in `<p>` (paragraph) tags.

Create the mustache file `/application/views/home.mustache`

~~~
<p style="color:green;">{{content}}</p>
~~~

We now need to update the `View_Home` class (`/application/classes/view/home.php`) to use the Home mustache view.

~~~
<?php defined('SYSPATH') OR die('No direct access allowed.');

class View_Home extends View_Template {

	function before()
	{
		parent::before();

		$this->insert_template('home', 'content');
	}    

	function page_title()
	{
		return 'Home';
	}

	function content()
	{
		return 'This is the Home page';
	}

}
~~~

As you can see we've now added a `before` method.  The `before` method calls the `before` method in the parent View class thus setting `template.mustache` as the base template.  We then insert `home.mustache` into the base template's `{{content}}` tag.

Our mustache template now looks like this:

~~~
<html>
    <head>
        <title>{{page_title}}</title>
        {{#styles}}
            <link type="text/css" href="{{href}}" rel="stylesheet" media="{{media}}" />
        {{/styles}}        
    </head>
    <body>
        <ul>
            {{#navigation}}
                <li><a href="{{href}}">{{name}}</a></li>
            {{/navigation}}
        </ul>
        <p style="color:green;">{{content}}</p>
    </body>
</html>
~~~

Go to `http://localhost/home` and **This is the Home page** should appear in green.