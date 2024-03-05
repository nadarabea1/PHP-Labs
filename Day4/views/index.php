<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glasses</title>
    <style>
        table {
            border-collapse: collapse;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        th,td{
            border: 2px solid black;
        }
        
    </style>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Details</th>
        </tr>
        <?php foreach ($items as $item) : ?>
            <tr>
                <td><?= $item->id ?></td>
                <td><?= $item->product_name ?></td>
                <td><a href="index.php?item=<?=$item->id?>">more</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div>
        <?php if ($pageID > 1) : ?>
            <a href='index.php?page=<?= $pageID - 1 ?>'>Previous</a>
        <?php endif; ?>
        <?php if ($pageID < $totalPages) : ?>
            <a href='index.php?page=<?= $pageID + 1 ?>'>Next</a>
        <?php endif; ?>
    </div>
</body>
</html>