# Button Theme Change Log
For FoundationPress changes, refer to [FoundationPress on Github](https://github.com/olefredrik/FoundationPress/).

## Next Release
## 2019-11-xx
* New Feature: Added hooks to the Front Page template: 
  * bp_front_before_content
  * bp_front_after_section_one
  * bp_front_after_section_two
  * bp_front_after_section_three
  * bp_front_after_content

## 1.4.1 
### 2019-09-26
* New Feature: Shop Hero and Feature Slide listing pages now include a sortable 'Enabled' column.
 
## 1.4.0
### 2019-09-23
* New Feature: Shop page heroes can be added via Admin. The customizer option for shop heroes now serves as a default/fallback option.

## 1.3.2
### 2019-08-16
* New Feature: Category pages for Audiobooks and E-Books product links now link directly to the relevant variations in the URL.
* Fixed: Updated WooCommerce email templates so they don't throw errors in WooCommerce 3.7.

## 1.3.1
### 2019-07-26
* Update: Added a responsive category menu high on the shop page to improve navigation.
* Tweak: Resumed cache busting via URL version parameter attached to the css call in `enqueue-scripts.php`.  
* Tweak: Changed the project slug in package-lock.json and package.json from `button-theme-2018` to `button-theme`
* Fix: Repair WooCommerce completed orders template.

## 1.3.0
### 2019-07-17
* Update: Re-synced with FoundationPress upstream repository
* Update: Added WooCommerce product archive loop to shop page.
* Tweak: Removed bottom padding on mobile top bar to give content more space on small screens.
* Tweak: Added conditional formatting to the front page to improve look when the 'Featured' section is set to show on top.
* Tweak: Added dots to front page sliders.

## 1.2.4
### 2019-05-22
* Fixed: Updated WooCommerce email templates so they don't throw errors in WooCommerce 3.6.3.

## 1.2.3
### 2019-04-26
* Update: Replaced Yotpo product code with newer gallery code for product pages.
* Meta: Added version 1.0.0 and release date to changelog and fixed some typos.

## 1.2.2
### 2019-04-25
* Tweak: Don't allow more than 2 products to display on poets archive. (Issue [#7](https://github.com/buttonpoetry/Button-Theme-2018/issues/7)).
* Bugfix: Show wholesale customers the correct price in minicart. (Issue [#1](https://github.com/buttonpoetry/Button-Theme-2018/issues/1))
* Update: Replaced Instagram code with newer Yotpo gallery code on the homepage.

## 1.2.1
### 2019-04-19
* Improvement: Added Featured Item image and copy control to the Customizer. (Issue [#14](https://github.com/buttonpoetry/Button-Theme-2018/issues/14)).
 
## 1.2.0
### 2019-04-19
* New Feature: Custom Shop Template. Currently the template is static, customization options are planned. (Issue [#9](https://github.com/buttonpoetry/Button-Theme-2018/issues/9))
* Fix Regression: Location dependent free shipping offer restored to shop page. (Issue [#13](https://github.com/buttonpoetry/Button-Theme-2018/issues/13))
* Tweak: Refactored some front page CSS to share styling with new shop page.

## 1.1.2
### 2019-03-11
* Tweak: Use thumbnail size on front page showcase to reduce page load. (Issue [#3](https://github.com/buttonpoetry/Button-Theme-2018/issues/3))
* Bugfix: Fix odd title attribute display on showcase cover images. (Issue [#4](https://github.com/buttonpoetry/Button-Theme-2018/issues/4))
* Bugfix: Restore auto p tagging for featured products on poet pages. (Issue [#5](https://github.com/buttonpoetry/Button-Theme-2018/issues/5))
* Bugfix: Retrieve correct button/buy now text on poet featured and carousel products. (Issue [#6](https://github.com/buttonpoetry/Button-Theme-2018/issues/6))
* Bugfix: Repair Indie and Instalink page tracking (Issue [#2](https://github.com/buttonpoetry/Button-Theme-2018/issues/2#issue-414327359))
* Meta: Added Changelog.md.
* Meta: Updated .github default issue template.

## 1.1.1
### 2019-02-22 
* Tweak: Improve mini cart. Cart now displays up to 5 items, and a 'see more' link if needed.
* Tweak: Numerous small responsive & spacing improvements to top bar, title bar, and off-canvas menus.
* Fix: Prevent individual bundle items from displaying in mini-cart.
* Fix: Pre-orders now show 'Pre-Order Now' on their shop buttons instead of 'Add to Cart'.

## 1.1.0
### 2019-02-21
* Improvement: Update Site Logo to SVG from plain text version
* Update: Catch up to FoundationPress Master
* Fix: Add missing alt tags on front page
* Fix: Make 'Meet the Poets' link on front page fill whole section for hover effects

## 1.0.0
### 2019-02-15
* First version ready for release.
