## Exim4UI
a [bootstrap](http://twitter.github.com/bootstrap/)pified version of the [Exim4U](http://exim4u.org/) Email Admin UI.

### Changes
#### Files removed:
* old stylesheet (/style.css)

#### Files added:
* new stylesheet: [Twitter Bootstrap 2.2.2](http://twitter.github.com/bootstrap/). */css/bootstrap.css* 
* new javascript file: [Twitter Bootstrap 2.2.2](http://twitter.github.com/bootstrap/). */js/bootstrap.min.js*
* new [jQuery](http://jquery.com/) (1.9.0) file. */js/jquery.min.js*
* new javascript file for table styling. */js/scripts.js*   

#### Content changes:
* stripped unused inline-styles and classes  
* tidied and fixed HTML markup

---

### Usage
* backup your *public_html/exim4u/* directory  
* simply replace the *.php files with the ones from this repo

---

### About  
* the HTML markup is now free from inline classes
* *bootstrap.css* and *bootstrap.js* are unmodified stock files from Bootstrap 2.2.2
* CSS classes used are:   
`.btn` for submit buttons  
`.input-append`, `.add-on` to append text to input fields.  
`.control-label`, `.controls`, `.form-actions` for login fields.  
`<table>` classes are injected through */js/scripts.js*
* styling intentionally kept to a minimum. Feel free to **add your own styles** and classes to the */css/bootstrap.css* stylesheet
* the functionality and PHP code remains untouched
It's just make-up release to provide a clean slate :)

---
### Todo
* add some kind of basic templating
* branch a heavier styled version for out-of-the box usage
