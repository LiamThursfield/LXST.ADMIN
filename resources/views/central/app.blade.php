<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/central/js/app.ts', "resources/central/js/pages/{$page['component']}.vue"])
    @routes
    @inertiaHead
</head>
<body>
@inertia
</body>
</html>
