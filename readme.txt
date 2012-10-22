=== Minecraft Item Library ===
Contributors: alieneila
Donate link: http://www.alieneila.net/
Tags: minecraft, items, recipes
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds the ability to create a Minecraft item/block/recipe/monster library using custom post types.

== Description ==
This plugin adds the ability to create a library of Minecraft items/blocks/recipes/monsters etc.

Option to auto insert item information, or shortcodes are available.

1. [mcitem-recipe] - Inserts a crafting table that will display what items are needed to craft the current item.
1. [mcitem-stats] - Inserts a table listing the stats of the item such as Points of Protection, Health, Durability, etc...
1. [mcitem-sources] - Inserts a table with mini-item images of the item/monster that the current item comes from.

On the custom post type edit page, there are 3 boxes:

1) Minecraft Stats - The following fields are available:

* Block/Item ID: Minecraft Item or Block ID	
* Stack Count: If stackable, how many per stack?	
* Health: How much health does the monster or critter have?
* Heals For: How much health is returned when used?
* Damages For: How much damage is done when used?
* Points of Protection: How many points of protection does the item give? (Max 10)
* Attack Strength: How much is the attack strength?
* Durability: How much durability does the item have?
* Hunger Restoration: How much hunger is restored? (Usually a max of 6)

2) Source Options - Provides drop down boxes of items/monsters that have been assigned as a Source.

3) Craftable Options

* Drop down selection of items assigned as a Crafting Station (ie. Crafting Table, Furnace)
* # of items that are crafted at a time.
* Up to 9 slots used with drop downs of items assigned as a Material.
* Format of recipe table of which 3 are available, Crafting Table, Furnace and Brewing.

28 MC Item (a custom taxonomy) Categories are automatically created when the plugin is activated. These are used for sorting just like post categories and can be added to menus in Wordpress's built in menu system.

Only 4 of these are required for the plugin to work.

* Craftable
* Material
* Crafting Station
* Source

The others you can create/add/delete as you see fit.

**Note** When the plugin is first activated, the 5 parent categories will show up in Minecraft Item > MC Categories. The other 23 will be there, but for some reason they will not show up there. To fix this, simply add another MC Category then go back to the MC Categories (since new ones are added via ajax) and the children will show up. Then you can just delete the new one you created. Not sure if this is a bug in Wordpress or if it's something I am doing wrong.

== Installation ==

1. Upload the contents of the zip file to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

or

1. Go to Plugins in the dashboard
1. Click Add New
1. Use the upload feature and upload the zip file. Wordpress will auto install the plugin.

or

1. Go to Plugins in the dashboard
1. Click Add New
1. Search for Minecraft Item Library
1. Install

== Frequently Asked Questions ==

= Have a question? =

Post it in the Wordpress support forum for this plugin.

== Screenshots ==

1.
2.

== Changelog ==

= 1.0 =
* Initial Launch