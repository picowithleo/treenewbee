
<ul class="nav nav-tabs justify-content-center">
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>home">Home</a>
    </li>
    <?php foreach($categories as $category) : ?>
        <li class="nav-item"><a class="nav-link" href="<?php 
        echo site_url('/categories/posts/'.$category['id']); ?>">
        <?php echo $category['name']; ?></a></li>
    <?php endforeach; ?>
</ul>

