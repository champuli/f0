<ul>
    <?php foreach ($data['tags'] as $tag): ?>
    <li>    
        <?php echo $tag['tags_name']; ?>
    </li>
    <?php endforeach; ?>
</ul>