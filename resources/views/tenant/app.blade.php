<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/tenant/js/app.ts', "resources/tenant/js/pages/{$page['component']}.vue"])
    @routes
    @inertiaHead
</head>
<body>
@inertia
</body>
</html>
