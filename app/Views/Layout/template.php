<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?= $this->include("Layout/css") ?>
    <style>
        body {
            background-color: #f4f4f9;
        }
    </style>
</head>
<body>
    <?= $this->include("Layout/navbar") ?>

    <div class="container">
        <?=  $this->renderSection("content") ?>
    </div>
    
</body>
</html>