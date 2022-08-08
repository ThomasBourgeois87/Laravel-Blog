<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Blog</title>
    <link rel="stylesheet" href="/app.css">
</head>
<body>


    <h1><?= $post->title; ?></h1>
    <div>
        <?= $post->body; ?>
    </div>


<a href="/">Go back</a>

</body>
</html>
