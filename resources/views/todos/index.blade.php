<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.2.1/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body class="relative">
    {{-- modal add --}}
    <div class="bg-black/30 w-full h-screen hidden justify-center items-center absolute" id="modalAdd">
        <div class="card w-96 bg-base-100 shadow-xl mx-[5%]">
            <form action="todos/add" method="post">
                @csrf
                <div class="card-body">
                <div class="card-actions justify-between">
                    <p class="text-[24px] text-indigo-600 font-bold">ADD</p>
                    <button class="btn btn-square btn-sm" id="modalClose">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>
                <input type="text" placeholder="Task" name="name" class="input input-bordered w-full max-w-xs" />
                <button class="btn btn-success">ADD</button>
                </div>
            </form>
        </div>
    </div>

    <div class="flex justify-center items-center w-full h-screen bg-indigo-400">
        <div class="w-full max-w-[500px] min-h-[500px] mx-[5%] flex flex-col bg-indigo-50 rounded-lg p-5">
            <div class="flex justify-between items-center mb-[15px]">
                <p class="text-[24px] text-indigo-600 font-bold">MY TODO LIST</p>
                <button class="btn btn-success" id="add">Add</button>
            </div>
            <div class="flex flex-col">
                @if (count($todos) == 0)
                    <p class="text-center text-[20px]">No List</p>
                @else
                    @foreach ($todos as $todo)
                        <div class="grid grid-cols-[1fr,auto] items-center hover:bg-indigo-200 p-2 rounded-lg cursor-pointer gap-1">
                            <p>{{ $todo->name }}</p>
                            <div class="flex sm:flex-row flex-col sm:gap-2 gap-1">
                                <button class="btn btn-success sm:btn-md btn-xs">Edit</button>
                                <form action="todos/delete/{{$todo->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-active btn-error sm:btn-md btn-xs">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <script>
        $('#add').click(function () { 
            $('#modalAdd').removeClass('hidden').addClass('flex');
        });

        $('#modalClose').click(function () { 
            $('#modalAdd').removeClass('flex').addClass('hidden');
        });
    </script>
</body>
</html>