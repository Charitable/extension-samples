# Usage

To add a new meta box to the Charitable campaign management page: 

1. Inside your extension, instantiate the `Charitable_Sample_Campaign_Metabox` class. 
2. Customize the `Charitable_Sample_Campaign_Metabox::register_sample_key_meta_box()` method with the ID, title and other details about your extension. 
3. Update `Charitable_Sample_Campaign_Metabox::admin_view_path()` with the correct path to your view files. 
4. Update `Charitable_Sample_Campaign_Metabox::save_sample_key()` with the meta key you want to save.
5. Update `sample-view.php` with the HTML that will render your meta box content.

## A note about views in Charitable 

If you're used to how other plugins work, you may find the Charitable setup a little unusual. Other plugin developers often have their HTML output interspersed with their PHP code. 

In Charitable, we work hard to keep our HTML output separate from our PHP code. Our PHP code _includes_ template or view files, and these contain the actual HTML output. 