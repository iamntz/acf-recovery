### How To easily recover ACF fields from exported PHP file

#### Prerequisites
1. Clone this repo on it's own folder, right into theme directory. The name is not important as long as it have it's own folder.
2. Have your exported fields as `acf_export.php` located one level upper than this script.
3. Edit `acf_export.php` and replace all instances of `register_field_group` with `re_register_field_group`.

So basically you will have a structure like this:

```
ThemeDirectory
ThemeDirectory\functions.php
ThemeDirectory\acf_export.php
ThemeDirectory\acf-export-recover\*
```

#### Set Up
1. In your `functions.php` file include the `recover.php`;
2. Access admin with `?recover-acf-fields=1` added in your URL;
3. Do not reload this page, otherwise you will have duplicates;
4. Remove `recover.php` from `functions.php`;
4. Enjoy!