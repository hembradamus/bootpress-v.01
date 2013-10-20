BootPress
=========

BootPress is a starter theme that attempts to offer as "Pure Bootstrap" of a foundation as possible.


###Why Wouldn't I Just Use Konstantin Obenland's _The Bootstrap_?
I honestly couldn't tell you. I started creating _BootPress_ because I was dissatisfied with the available solutions for reconciling Bootstrap and WordPress, but those solutions did not include _The Bootstrap_ (had I actually known _The Bootstrap_ existed, I probably wouldn't have created _BootPress_ : )

Should you not like _BootPress'_ methodology for incorporating Bootstrap, find its construction problematic, or simply dislike its name, I definitely recommend checking out [_The Bootstrap_](http://en.wp.obenland.it/the-bootstrap/ "The Bootstrap").

That said, I do believe _BootPress_ does have some unique and worthwhile things going for it, and hope folks find it useful in its own right. I also plan to continue developing it, so feedback on how to improve it is definitely welcome!


###_BootPress_ Overview
#### What _BootPress_ Attempts to Address #####
As mentioned earlier, I started _BootPress_ for lack of an integration solution that provided as "pure" of a Bootstrap-based foundation as I was hoping to find.  Methods I reviewed seemed to undermine Bootstrap purity by either integrating it into themes with preexisting styles, "adapting Bootstrap for WordPress" rather than simply including it as-is, or unnecesarily introducing its own solely aesthetics-oriented styles.

What I was hoping to find (and what I'm hoping to create here) is a solution that avoids these practices and instead allows developers to:
- Presume Bootstrap provides the sole foundation for style and responsiveness
- Presume Bootstrap behaves the same way/is structured the same way it would be outside of WordPress


#### Contents of _BootPress_ ####
In order to accomplish the above goal, _BootPress_ contains the following:
- Template files written to output HTML structured for Bootstrap
- ``bootstrap.min.css`` and ``bootstrap.min.js``
- The SCSS files ``style.scss`` and ``_bpReconciler.scss`` (these compile into ``style.css``)
- JS file containing the object literal ``bpRig``
- The file ''wp_bootstrap_navwalker.php'' by [Edward McIntyre](https://github.com/twittem/wp-bootstrap-navwalker)


#### Template Files / 'Slap-a-Class-On-It' Styling ####
_BootPress_ 1st step in providing a "pure Bootstrap" integration solution is the establishment of a "naked" WordPress theme (does not contain any of its own CSS, JS, or classes in the markup) that  generates a fully functional but completely unstyled version of WordPress. From there, _BootPress_ queues Bootstrap's CSS and JS files and attempts to establish styles solely through the application of Bootstrap classes to the relevant template file elements.

To further facilliate this method of styling, template files are written to output HTML that corresponds to how Bootstrap structures its elements (i.e. main layout ``divs`` contain enough levels to accomodate the ``.row`` and ``.col-xx-xx`` classes, and calling ``<? php get_sidebar(); ?>`` encloses the normal sidebar markup in an additional div to account for the ``.col-xx-xx`` and ``.sidebar-nav`` classes).  In situations where simply applying Bootstrap classes produces results that appear acceptable but still a little rough around the edges (for example, even with properly structured markup, simply applying Bootstrap's sidebar classes to establish a sidebar leave its headers looking awakwardly large), _BootPress_ opts for solutions on the markup side over CSS solutions (in the previous example, markup files are changed to output ``h4``s rather than introduce a ``.sidebar-nav h3`` style)

For the most part, this slap-a-class-on-it method of styling is almost entirely sufficient for fashioning the "naked" WordPress theme into one that resembles (and offers a similiar starting point) to a standard Twenty-XXXXX theme, albeit with Bootstraps responsiveness bells and whistles, markup constructed for Bootstrap-compatibility, and the ability to essentially use ``bootstrap.min.css`` as its ``style.css``.


#### Original _BootPress_ CSS / Overview of _BootPress'_ Non-Bootstrap Elements ####
There are instances where _BootPress_ does introduce its own CSS: namely, to address WP Login/Admin related conflicts, and to provide basic readability for WP elements that lack a direct Bootstrap counterpart (specifically, threaded comments and certain post-meta elements).

For Admin conflicts, original _BootPress'_ CSS is name-spaced for Login/Admin pages and written to restore their default WordPress styles. For general viewer facing elements, _BootPress_ 1st attempt to use whichever Bootstrap classes come closest (i.e. Bootstrap's ``media`` classes for comments) and any CSS introduced to fill in the holes uses dimensions and media query structures already found in Bootstrap wherever possible (i.e. padding pixel widths and collapse points). 

Overall, _BootPress_ introduces less than 100 lines of non-Bootstrap CSS which can be identfied by referring either to the top of ``style.css`` or to the file ``_bpReconciler.scss``.

Additionally, _BootPress_ makes use of ''wp_bootstrap_navwalker.php'' by [Edward McIntyre](https://github.com/twittem/wp-bootstrap-navwalker) to structure its global nav; this file contains none of its own styles/is consistent with _BootPress_ overall approach.


#### 'BootPress Rig' and Integrating Future Bootstrap Updates ####
Although I initially started building _BootPress_ to address the reasons that have pretty much been mentioned ad nauseum at this point, I noticed that there were also some other issues that people were coming across when integrating Bootstrap. These issues are (what I call) transparency (being able to quickly and comprehensively know where Bootstrap is actually integrated in an integration solution) and updatability.

My hopefully-not-terrible solution for these other issues is something I call the BootPress Rig. Since _BootPress_ is styled almost entirely through the application of Bootstrap classes to template files, overall theme styles can be established by adding the necessary Bootstrap classes from a centralized place rather than directly including them in the template files. The BootPress Rig does this by listing the DOM elements and the Bootstrap classes they'd need in JSON, then running through the list with a simple jQuery each/addClass function.

By having centralized place from which all classes are applied, developer can much more easily and comprehensively see how Bootstrap is being integrated, can hopefully more easily integrate future Bootstrap upgrades, more easily reverse upgrades should they not go well, and continue to control additional Bootstrap integration from (for developers who edit the theme directly).

At the time of this writing, this is the aspect I'm most apprehensive about. As an inexperienced developer, not sure if this method of adding classes is problematic/would definitely be interested in hearing criticisms of this approach for keeping the Bootstrap classes separate from the template files.  2 alternative methods that I have contemplated so far are SCSS and PHP. In the SCSS method, I used a SCSS'S ability for classes to inherit each other's styles via ``@extend`` to create a single stylesheet that operated similarly to the current Rig (users could know where Bootstrap was applied by seeing which ``@extend``s a _BootPress_ class had applied to it. While this method worked for styling, it also made the final stylesheet significantly longer, was harder to debug, and broke Bootstrap scripts that relied on actual class names applied to DOM elements. I haven't thought too much of what a PHP solution might look like, but am concerned that doing something similar to the current Rig via PHP would slow the site down since it'd presumably have to execute on the server for every page load.




#### Customization and Optimization ####
Content TBD - (customizing the Rig, BootPress SCSS, Bootstrap LESS, optimization )



### License Info
http://www.gnu.org/licenses/gpl-3.0.html