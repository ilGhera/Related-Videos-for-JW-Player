=== Related Videos for JW Player ===
Contributors: ghera74
Tags: Related posts, related videos, videos, player, JW Player
Requires at least: 4.0
Tested up to: 4.7.4
Stable tag: 1.2.0
License: GPLv2


It creates the feed required from "Related Videos" add-on for JW Player, one for each Wordpress category. 

== Description ==

If you're using JW Player on your site, you probably know Related Videos, a free add-on that allows you to show more contents to the users in a beautifull and simple layout.<br>
Related Videos for JW Player will creates the correct xml for each category, so you'll be able to show related contents dynamically.<br>
Go to **Settings/ Related Videos for JW Player** menu and set you preferences.<br>

This block of code is an example of what  the plugin generates.
<pre>
'related': {
   'file': 'http://yoursite.com/category/blog/?feed=related-feed',
   'heading': 'More videos!',
   'onclick': 'link',
} 
</pre>


== Installation ==

**From your WordPress dashboard**

* Visit 'Plugins > Add New'
* Search for 'Related Videos for JW Player' and download it.
* Activate Related Videos for JW Player from your Plugins page.
* Once Activated, go to **Settings/ Related Videos for JW Player** menu and set you preferences.

**From WordPress.org**

* Download Related Videos for JW Player
* Upload the 'related-videos-for-jwplayer' directory to your '/wp-content/plugins/' directory, using your favorite method (ftp, sftp, scp, etc...)
* Activate Related Videos for JW Player from your Plugins page.
* Once Activated, go to **Settings/ Related Videos for JW Player** menu and set you preferences.


== Frequently Asked Questions ==

**Where can I find informations about Related Videos for JW Player?**<br>
Go to <a href="https://support.jwplayer.com/customer/portal/articles/1483102#fndtn-dashboard" target="_blanc">https://support.jwplayer.com/customer/portal/articles/1483102#fndtn-dashboard</a><br>

**What Related Videos for JW Player does?**<br>
It creates the feed required from "Related Videos" plugin of JWPlayer, one for each category, so you'll be able to show related contents dynamically.<br>

**What have I to do after the installation?**<br>
Once Activated, go to **Settings/ Related Videos for JW Player** menu and set you preferences.

* Chose how to get the images of your Related videos (featured image or custom field).
* Select the Wordpress category.
* Add your a custom heading.
* Save the options.
* Copy and past the generated snippet into your JW Player video code.


== Screenshots ==
1. Related Videos for JW Player - Result
2. Related Videos for JW Player - Options 1
3. Related Videos for JW Player - Options 2


== Changelog ==

= 1.2.0 =
Release Date: 5 May 2017

* Enhancement: The code snippet is now generate dinamically.
* Enhancement: Added category field
* Enhancement: Added heading field
* Enhancement: Added resources in sidebar

1.1 - Small fix.

1.0 - First release.
