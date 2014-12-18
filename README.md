Traq Development Tools
======================

This repository contains the development tools and default theme CSS files.

Requirements
------------

* [node.js](http://nodejs.org)
* [Bower](http://bower.io)
* [gulp.js](http://gulpjs.com)
* [Less.js](http://lesscss.org)
* [CoffeeScript](http://coffeescript.org)

Setup
------

### Clone

To setup the development tools simply clone this repository to `dev` in
your Traq directory like so:

````
cd /path/to/traq
git clone https://github.com/traq/dev_tools.git dev
````

### Install

Install Bower, Gulp, Less and CoffeeScript:

````
npm install -g bower
npm install -g gulp
npm install -g less
npm install -g coffee-script
````

Install dependencies:

````
npm install
````

Usage
------

Watch for changes in Less and CoffeeScript files:

````
gulp watch
````

Compiling Less files:

````
gulp less
````

Compiling CoffeeScript files:

````
gulp coffee
````
