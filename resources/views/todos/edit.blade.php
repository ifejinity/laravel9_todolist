<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List | Update</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.2.1/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body class="relative">
    <div class="bg-indigo-400 w-full h-screen flex justify-center items-center">
        <div class="w-full max-w-[500px] h-fit bg-indigo-50 rounded-lg shadow-lg p-5 flex flex-col mx-[5%]">
            <div class="flex justify-between gap-2 items-center mb-[20px]">
                <p class="text-[24px] text-indigo-600 font-bold">EDIT</p>
                    <a href="{{route('todos.index')}}" type="submit" class="btn btn-active btn-warning">BACK</a>
            </div>
            
            @foreach ($todos as $todo)
                <form action="{{route('todos.save', $todo->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" value="{{ $todo->name }}" class="input input-bordered w-full mb-2" name="name" required/>
                    <button type="submit" class="btn btn-active btn-success">SAVE</button>
                </form>
            @endforeach
        </div>
    </div>
</body>
</html>