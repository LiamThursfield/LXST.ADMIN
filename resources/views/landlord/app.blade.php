<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/landlord/js/app.ts', "resources/landlord/js/pages/{$page['component']}.vue"])
    @routes
    @inertiaHead
</head>
<body>
@inertia
</body>
</html>
