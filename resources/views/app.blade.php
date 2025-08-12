<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/js/app.ts', "resources/js/pages/{$page['component']}.vue"])

    @inertiaHead
</head>
<body>
@inertia
</body>
</html>
