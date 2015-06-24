Flatland is a static website generator, created with the intention of being extremely lightweight and not dependant on any third-party libs. It uses XML for data storage, and PHP for backend.

Templates
=========

It features a rudimentary templating system, with module and menu content being included using curly braces.
These can be used within content to enable module embedding.

Data
====

Check the XML schemas in "App/Lib/Schemas" for an overview of the data models. This should give you an idea of how to add content to your site.

Layout
======

Edit the files in "App/Data/Template" to structure your layout.

Usage
=====

Add CSS, JS and image files to "web" folder and use PHP CLI to run "App/generator.php".
HTML files will be generated in "web" folder, this must be used as your web root.

License
=======

Feel free to use and distribute.

This is currently a work in progress, I will update as I add more features.
