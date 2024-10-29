=== Backend Redirect ===

Contributors: JMcIntyre
Tags: admin, roles, security, redirect, cms
Requires at least: 2.7
Tested up to: 2.8.6
Stable tag: 0.2

Redirects all non admin users who try to access the WordPress backend to a defined URL.

== Description ==

Another simple problem solving plugin. If a user tries to login to wordpress but is not an admin, they are redirected to the homepage.

Note that this assumes you have built your own login form - if not, it may be a messy process for 'subscribers' or other roles to log in.

== Roadmap ==

* Define redirect on a per role basis

== Known Issues==

* None - <a href="http://www.jackmcintyre.net/projects/backend-redirect/?utm_source=wordpress&utm_medium=plugin&utm_campaign=backend-redirect">let me know</a> if you find any.

== Installation ==

1. Upload the backend-redirect folder to the '/wp-content/plugins/' directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Set url to redirect to. Defaults to the home page

== Changelog ==

= v 0.2 =
* Added Options Page
* Added ability to define URL to redirect to

= v 0.1 =
* First Release
