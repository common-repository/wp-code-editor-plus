=== WP Code Editor Plus ===
Contributors: RingZer0
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=273XBFBRX3F82&lc=US&item_name=RingZer0%20Development&item_number=1&no_note=0&cn=Share%20with%20me%20your%20ideas&no_shipping=1&rm=1&return=http%3a%2f%2fringzer0devel%2ewordpress%2ecom%2fthanks%2dfor%2ddonating&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted&for=wp%2dcode%2deditor%2dplus
Tags: plugin editor, theme editor, syntax, highlighting, syntax hilighting,
code editor, IDE
Requires at least: 2.6
Tested up to: 3.1.3
Stable tag: 3.2.2

Code Editor, Syntax Hilighter, Code Completion, and usability rolled into my
version of an IDE. Created to mimic the features of popular desktop
software

== Description ==

WP Code Editor Plus (origionally AE Syntax) has changed its name to match the
scope of the project.  The project being to replicate the best features of
off-line code editing software.

Current Features Include:
 * Syntax Highlighter
 * JavaScript Code Completion
 * Ability to resize editor via click & drag

Future Features may Include:
 * Options Page
 * Multiple files opened at the same time
 * Tabs
 * Horizontal Splits
 * Verticle Splits
 * Find and Replace
 * Revision Control
 * File Backup Ability
 * Preview Ability

All future features completely depend on ratings, feedback and polls.  So far
with AE Syntax I have received a lot of positive feedback.


== Installation ==

1. Upload zip contents to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

(No configuration necessary at this point)



== Still Left To Complete ==
* Find & Replace
* Options Page for:
	* Auto Complete JavaScript
	* Tagging line breaks
* Edit Post (HTML) integration (optionally)



== Screenshots ==
1. Screenshot (right click and view full size)


== Changelog ==

= 1.0 =
First release of my first public plugin -- Biggest challenge is validating the
readme.

= 1.1 =
Thanks to <a href="http://wordpress.org/support/profile/pothi">pothi</a> for
identifying a display issue where the editor's internal divs inherited a 190px
margin-right.  Now I have something to add to my <a
href="http://wordpress.org/extend/kvetch/">Kvetch</a>.  Also important in this
release is a known "issue" or feature that doesn't appear to be working.

I have attempted to integrate jQuery UI's <a
href="http://jqueryui.com/demos/resizable/">Resizable</a> to the editor so
users can size their own editor as well.  It produces no JS errors, and
created the nested divs and CSS classes necessary, but does not resize.  I
have used wp_enqueue_script() to queue up jQ-ui-core, ui-widget, ui-mouse and
ui-resize.  My guess is it is an inherited style that is hiding the resize
handle.  If someone wishes to contribute a few lines of CSS to make the handle
show up in the right place, that would be wonderful.  It should be fixed in
v.1.2.

= 2.0 =
Rebrand!  The project has gained direction and scope and is no longer just for
highlighting syntax, but now going the direction of an entire IDE replacement
able to do anything you can online that you could do offline, or via ssh.  I
have always been a firm believer that "one should never edit code directly on
the server" -- My goal is now to change that mindset, turning the production
server/webpage into a production environment as well as a development and
staging environment.  Through revisions, output buffers, the sick hooks
everywhere... why not.  If theme test drive can do it with themes, why can't
there be an all inclusive web based IDE.  (Death to Desktop Applications! Viva
platform independant code!).

= 3.1 =
Open files with ajax, multiple windows with daggability, added 12k of graphics
and 24k more JavaScript.  Added ability to donate.

= 3.2 =
Fixed the issue preventing the editing of themes that were not currently
active, as well as added plugin selection.  Improved minimize & restore
functionalities so minimized and restored windows were not covering eachother.
The development has been slow due to little feedback and no coffee, dispite
the execellent written reviews, being placed on top-10 lists and the ratings.
But open source is not all about the donations.  I have really enjoyed
creating this plugin, and may actually make .windowize() into a jQuery plugin
as well.

= 3.2.1 =
Added a "task bar" container fixed at the bottom of the window to hold the
minimized code windows.

= 3.2.2 =
Added quick-open feature within an hour of the request.  I really enjoy when
people get involved and find ways to make the application better.  Special
thanks to Ovidiu for the request
http://wordpress.org/support/topic/plugin-wp-code-editor-plus-feature-request


== WARRANTY ==

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

== Donations ==

If you use it, a lot, and like it, a lot... buy me a coffee.  Total donations
as of 3.2.1 :: $0.00.  lol... I've always wondered why people spam their
donate like w3totalcache (though a much cooler and more used plugin than
this).
<a
href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=273XBFBRX3F82&lc=US&item_name=RingZer0%20Development&item_number=1&no_note=0&cn=Share%20with%20me%20your%20ideas&no_shipping=1&rm=1&return=http%3a%2f%2fringzer0devel%2ewordpress%2ecom%2fthanks%2dfor%2ddonating&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted&for=wp%2dcode%2deditor%2dplus">Click to Donate</a>




