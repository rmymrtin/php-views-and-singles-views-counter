<?php
require 'core/database.php';
require 'core/functions.php';
checkUniqueViewAndAddView();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <p>
        <?php echo getUniqueViews() ?> vues <b>uniques</b>
    </p>
    <p>
        <?php echo getViews() ?> vues
    </p>
</body>

</html>