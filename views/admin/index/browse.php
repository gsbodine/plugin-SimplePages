<?php
$head = array('body_class' => 'simple-pages primary', 
                   'title' => 'Simple Pages | Browse');
head($head);
?>
<h1><?php echo $head['title']; ?></h1>
<p id="add-page" class="add-button"><a class="add" href="<?php echo uri('simple-pages/index/add'); ?>">Add a Page</a></p>
<div id="primary">
<?php if (empty($pages)): ?>
    <p>There are no pages. Why not <a href="<?php echo uri('simple-pages/index/add'); ?>">add one</a>?</p>
<?php else: ?>
    <?php echo flash(); ?>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Created By</th>
                <th>Published?</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($pages as $page): ?>
            <tr>
                <td><?php echo $page->title; ?></td>
                <td><?php echo $page->slug; ?></td>
                <td><?php echo $page->getCreatedByUser()->username; ?></td>
                <td><?php if ($page->published): ?>
                <a href="<?php echo public_uri($page->slug); ?>">Published</a>
                <?php else: ?>
                Not Published
                <?php endif; ?></td>
                <td><a class="edit" href="<?php echo uri("simple-pages/index/edit/id/$page->id") ?>">Edit</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
</div>
<?php foot(); ?>