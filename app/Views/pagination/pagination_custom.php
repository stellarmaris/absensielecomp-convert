<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- app/Views/pagination_custom.php -->
<div class="pagination-wrapper">
    <ul class="pagination">
        <?php if ($pager->hasPreviousPage()): ?>
            <li class="page-item">
                <a href="<?= $pager->getFirst() ?>" class="page-link">First</a>
            </li>&nbsp;
            <li class="page-item">
                <a href="<?= $pager->getPrevious() ?>" class="page-link">Previous</a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <span class="page-link">First</span>
            </li>
            <li class="page-item disabled">
                <span class="page-link">Previous</span>
            </li>
        <?php endif; ?>

        <?php foreach ($pager->links() as $link): ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a href="<?= $link['uri'] ?>" class="page-link"><?= $link['title'] ?></a>
            </li>
        <?php endforeach; ?>

        <?php if ($pager->hasNextPage()): ?>
            <li class="page-item">
                <a href="<?= $pager->getNext() ?>" class="page-link">Next</a>
            </li>
            <li class="page-item">
                <a href="<?= $pager->getLast() ?>" class="page-link">Last</a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <span class="page-link">Next</span>
            </li>
            <li class="page-item disabled">
                <span class="page-link">Last</span>
            </li>
        <?php endif; ?>
    </ul>
</div>

</body>
</html>