<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Mail</title>
</head>
<body>
Hello <i>{{ $task->mailFrom()['name'] }}</i>,

<p>This is a demo email for testing purposes! Also, it's the HTML version.</p>

<p><u>Demo object values:</u></p>


<p><u>Values passed by With method:</u></p>

<div>
    <p><b>testVarOne:</b>&nbsp;{{ $task->mailFrom()['name'] }}</p>
    <p><b>testVarTwo:</b>&nbsp;{{ $task->mailFrom()['email'] }}</p>
</div>

Thank You,
</body>
</html>


