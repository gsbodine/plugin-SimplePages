<?php echo head(array(
    'title' => metadata('simple_pages_page', 'title'),
    'bodyclass' => 'page simple-page',
    'bodyid' => metadata('simple_pages_page', 'slug')
    )); 

    $pageId = metadata('simple_pages_page', 'id');
    $parentId = metadata('simple_pages_page', 'parent_id');
    if ($parentId != 0) {
        $pageId = $parentId;
    }

?>
<div class="row">
    <div class="span12">
        <p id="simple-pages-breadcrumbs"><?php echo simple_pages_display_breadcrumbs(); ?></p>
        
        <div class="row">
            <div class="span3">
                <?php echo simple_pages_navigation($parentId = $pageId) ?>
            </div>
            <div class="span9">
                <h1><?php echo metadata('simple_pages_page', 'title'); ?></h1>
                 <?php
                    $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
                    if (metadata('simple_pages_page', 'use_tiny_mce')) {
                        echo $text;
                    } else {
                        echo eval('?>' . $text);
                    }
                 ?>
            </div>
        </div>
    </div>
</div>
<?php echo foot(); ?>
