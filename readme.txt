=== WordPress AB Content Optimizer ===
Contributors: Rustaurius, EtoileWebDesign
Tags: ab testing, test groups, theme test, comparison testing
Requires at least: 4.0.0
Tested up to: 4.7
License: GPLv3
License URI:http://www.gnu.org/licenses/gpl-3.0.html

Simultaneously test multiple versions of your site, with separate themes, plugins, etc. and discover the site your visitors want

== Description == 

`
Plugin is still in beta, so please report any bugs you might find in the support forum! We'll be rolling out more advanced features over the summer. Right now, the plugin would work best for testing changes to your site by WordPress users, not the general public.
`

WP AB Content Optimizer helps you give your visitors and users the site they want. By allowing you to create two or more different versions of your website and assign each version to a certain percentage of your user base/visitors, you can test different themes, content, features and more to see which version gets the most traction.

With Google Analytics integration, you'll be able to tell exactly which version has the best metrics, such as the most page views, the most time on site, etc. With this information in hand, you'll know which version (or combination of versions) is right for your site.

Giving your visitors the best web experience possible is paramount. But it can be hard to know exactly the look, feel and content they want. No need to guess anymore. With the advanced A/B testing capabilities of the WP AB Content Optimizer, you'll know exactly which features, layout and content your customers appreciate and keep coming back for. 

To get started, click on "A/B Optimizer" in WordPress admin menu, head to the "Tests" tab, and get started creating new tests/versions of your site! You can try different themes, changing some of your content, put in shortcodes from different plugins, or even change what pages are shown in your menus!

= Key Features =

* Test two or more versions of your website with A/B testing
* Google Analytics integration for important statistics about each of your versions
* Choose different WordPress themes for each version
* Assign a specific percentage of users to each version
* Add custom CSS for a specific version
* Pause individual tests/versions


= Shortcodes =

* [ab-testing id='X'][/ab-testing]

-----------------------------------------------------------------------------------

== Installation ==

1. Upload the 'wp-ab-content-optimizer' folder to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress

or

1. Go to the 'Plugins' menu in WordPress and click 'Add New'
2. Search for 'WP AB Content Optimizer' and select 'Install Now'
3. Activate the plugin when prompted

= Getting Started =

1. Create a new test:
    * Click on 'A/B Optimizer' in the WordPress admin sidebar menu
    * Go to the 'Tests' tab and choose the 'New Test' tab
    * Give your test a name
    * Set it to 'Active'
    * Choose what percentage of users you'd like to be assigned to this test/group
    * Choose a WordPress theme to display for this test
    * Click the 'Save Changes' button

2. Customize your A/B testing experience by making use of the available settings and options, including Google Analytics tracking, assigning specific themes to specific tests, adding custom CSS to specific versions and more.

For a list of specific features, see the WP AB Content Optimizer description page here: https://wordpress.org/plugins/wp-ab-content-optimizer/.

For help and support, please see:

* Our FAQ page, here: https://wordpress.org/plugins/wp-ab-content-optimizer/faq/
* The WP AB Content Optimizer support forum, here: https://wordpress.org/support/plugin/wp-ab-content-optimizer

-----------------------------------------------------------------------------------

== Frequently Asked Questions ==

= How do I get started? =

Click on "A/B Optimizer" in WordPress admin menu, head to the "Tests" tab, and get started creating new tests/versions of your site! You can try different themes, changing some of your content, put in shortcodes from different plugins, or even change what pages are shown in your menus!

= How do I make content specific to one version of my site? =

Any content placed in between the [ab-testing id='X'] and [/ab-testing] shortcodes will be restricted to the version of your site with the ID that you specify.

= How do I enable tracking and statistics? =

Set "Enable Tracking" to "Yes" in the "Basic" area of the "Options" tab. You can then choose whether or not you'd like to display stats on individual pages and/or track WooCommerce sales. 

= Where can I view these statistics? =

The stats can be viewed in the "Dashboard" tab, both in the graphics at the top and in the "Tests Summary" table underneath the graphics.

= How do I integrate Google Analytics? =

In the "Analytics" area of the "Options" tab, you can choose to insert Google Analytics tracking code on each page as well as specify a custom metric and custom dimension.

= Can I send someone directly to a specific test group? =

To send a user directly to a specific test group, you can use the following link: http://www.yourdomain.com/?Action=EWD_ABCO_SwitchGroups&Group_ID=1.

You'll have to replace "yourdomain" with the URL of your site. You'll also have to switch the "1" at the end for the actual ID of the version/group you want to send them to.

= Can I add custom CSS that is specific to a test group? =

This is certainly possible. Go to the "Tests" tab and click on the test you want to modify. There you can use the "Custom CSS for Test Group" area to add CSS that will only be applied to this test group.


-----------------------------------------------------

== Screenshots ==

1. Main dashboard view in the plugin admin.
2. Create a new test screen.
3. View of a specific test's settings in the admin.
4. Overview of current tests.
5. Basic section of the "Options" tab.
6. Google Analytics integration options.

-----------------------------------------------------

== Changelog ==
= 0.7 = 
- Minor styling update

= 0.6 =
- Minor styling update

= 0.5 =
- Added in some missing styles for the Admin area

= 0.4 =
- Added a direct link to the bottom of each test so visitors can be sent directly to a specific test

= 0.3 =
- Big update! Includes Google Analytics tracking using a custom dimension or metric that you select
- Added optional tracking of events such as page loads and time on site split up by user group
- Option to display average time on individual pages by user group in the admin area
- Ability to track WooCommerce sales by user group
- Ability to create custom events within your theme or using JavaScript, and track those as well
- Option to get all tracking data using PHP functions
- Updated the Dashboard layout
- Added ability to add custom CSS specifically for each user group, to let you compare the impact of styling changes on user behaviour

= 0.2 =
- Fixed an error where the Google Analytics tracking code was being added no matter what

= 0.1 =
- Initial beta version. Please make comments/suggestions in the "Support" forum.

== Upgrade Notice ==

