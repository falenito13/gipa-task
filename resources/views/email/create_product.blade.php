<!DOCTYPE html>
<html>
<head>
    <title>GIPA Task</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-20">
    <h2 class="font-bold text-xs text-green-600">New Product</h2>
    <div>
        <h2 class="text-gray-800 text-3xl font-semibold">Name : {{$details['name']}}</h2>
        <h2 class="mt-2 text-gray-600">Price : {{$details['price']}}</h2>
    </div>
</div>
</body>
</html>
