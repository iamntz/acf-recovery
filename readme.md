### How To easily recover ACF fields from exported PHP file

#### Prerequisites
1. ACF (and all ACF extensions) should be loaded from `functions.php`, _before_ acf-recover. **Do not try to use ACF as a plugin, otherwise this utility won't play nice.**
1. Clone this repo on it's own folder, right into theme directory. The name is not important as long as it have it's own folder.
2. Have your exported fields as `acf_export_recover.php` located one level upper than this script.
3. Edit `acf_export_recover.php` and replace all instances of `register_field_group` with `re_register_field_group`.

So basically you will have a structure like this:

```
ThemeDirectory
ThemeDirectory\functions.php
ThemeDirectory\acf_export_recover.php
ThemeDirectory\acf-recovery\*
```

#### Set Up
1. In your `functions.php` file include the `recover.php`;
2. Access admin with `?recover-acf-fields=1` added in your URL;
3. Do not reload this page, otherwise you will have duplicates;
4. Remove `recover.php` from `functions.php`;
4. Enjoy!


#### Extra tweaking
You can change default entry status (which is _draft_) and entry title suffix (which is _(recover)_ ) by adding these two filters in your `functions.php` file:

```php
add_filter( 'acf/import/post_status', function(){ return "publish"; } );
add_filter( 'acf/import/title_suffix', function(){ return ""; } );
```


#### Resources
1. [ACF Recovery](https://github.com/seamusleahy/ACF-PHP-Recovery) (works only with ACF 3)
2. [Lost many fields after import.](http://support.advancedcustomfields.com/forums/topic/lost-many-fields-after-import/)