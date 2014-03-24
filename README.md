##What's a Robots.txt file?

If there are areas of your site you do not want indexed by search engines, you can use a robots.txt file to inform the spiders where to go and not go. These files are a simple text file that's placed on your web server.

##The problem

When developing a site we've quite often come up against the issue of the robots.txt file needing changing based on the server. For example, on a staging or development server you want the entire site to be hidden whereas on a live site you may want it all to be open.

##A solution

There are methods to control this via .gitignore files etc but it gets a bit messy and isn't for everyone.

The solution I'm proposing will only work in certain situations - namely an ExpressionEngine build, but the idea could be applied equally well to other platforms.

###Assumptions:
* You don't already have a .robots.txt file at your root
* You are using [Focus labs's excellent Master Config](https://github.com/focuslabllc/ee-master-config)

###Getting started

Install the plugin by downloading it from [GitHub](https://github.com/CarterDigital/robots) and add the robots directory to your Third Party directory, normally found here:

`/system/expressionengine/third_party/`

Create a directory under your site's template group - typically:

`/system/expressionengine/templates/default_site/robots.txt.group`

Add a reference to the plugin:

`{exp:robots:txt}`

Thats it! Now based on the *Config Env* the plugin will display the appropriate robots.txt.

##Configuring

If you'd like to modify the output of the robots.txt file make the changes to the pi.robots.php file starting on about line 33.

`...`
` switch (ENV) {`
`                case 'prod' :`
`$robots = "User-agent: *`
`Disallow:  /system";`
`...`

