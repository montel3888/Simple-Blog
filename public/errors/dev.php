<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
</head>
<body>

<h1>There is an Error</h1>
<p><b>Error code:</b> <?= $errno ?></p>
<p><b>Error text:</b> <?= $errstr ?></p>
<p><b>File with the error:</b> <?= $errfile ?></p>
<p><b>Line number with the error:</b> <?= $errline ?></p>

</body>
</html>