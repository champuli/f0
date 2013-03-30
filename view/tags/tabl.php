<table border="1">
    <tr>
        <th>Tag name</th><th>Tag id</th>
    </tr>
    <?php foreach ($data['tags'] as $tag): ?>   
    <tr>
        <td><?php echo $tag['tags_name']; ?></td><td><?php echo $tag['id']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>