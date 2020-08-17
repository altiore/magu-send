{{$demo = $task}}
Hello {{ $demo->mailFrom()['name'] }},
This is a demo email for testing purposes! Also, it's the HTML version.

Demo object values:

Demo One: {{ $demo->mailFrom()['name'] }}
Demo Two: {{ $demo->mailFrom()['email'] }}

Values passed by With method:

testVarOne: {{ $demo->mailFrom()['name'] }}
testVarOne: {{ $demo->mailFrom()['email'] }}

Thank You,
{{ $demo->mailTo()['name'] }}