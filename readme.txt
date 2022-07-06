=== Role Specific Max Upload Size | Set different upload size limit to each user role ===
Contributors: aswingiri, asterisktech
Tags: max upload file size, increase upload limit, increase file size limit, upload limit, post max size, upload file size, upload_max_filesize, Increase Maximum Execution Time
Requires at least: 3.0
Requires PHP: 5.6
Tested up to: 5.8.2
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Set different maximum upload file size limit for each user roles and Increase upload size limit on your wordpress installation.


== Description==

### ** Set different maximum upload size limit based on user role **
Plugin detects upload limits set by WordPress and upload size limit set on server, and list them on settings area. This plugin can be used to increase or decrease upload size limitation for certain user role.


== Installation ==

Install from WordPress admin area;

1. Open WordPress admin, go to Plugins, click Add New
2. Enter "Role specific max upload size" in search and hit Enter
3. Plugin will show up as the first on the list, click "Install Now"
4. Activate & open plugin's settings page located at _wp-admin > settings > Role specific Max upload size_

Install manually with FTP;

1. Download the plugin.
2. Unzip it and upload to _/wp-content/plugins/_ folder with FTP client.
3. Open WordPress admin area and navigate to plugins page
4. Activate plugin from the plugins list and open plugin's settings page located at _wp-admin > settings > Role specific Max upload size_



== Screenshots ==
1. Settings page for Role Specific max upload size.




== Frequently Asked Questions ==

= Can I increase max upload size with this plugin? =

Yes, you can increase or decrease max upload size for any user role.

= Why does value reverts back to same when I save changes with bigger values? =
Please note limitation set on server can not be changed from wordpress plugin, if you try to save value bigger than limitaion set on server, it will revert back to the maximum limitation set on your server.
