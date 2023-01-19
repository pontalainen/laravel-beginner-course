<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        </style>
    </head>

    <body class="antialiased">

        <div
            class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <div style="color: black;">
                <h1>todo list</h1>



                <form method="post" action="{{ route('saveItem') }}" accept-charset="UTF-8">
                    {{ csrf_field() }}

                    <label for="listItem">New Todo Item</label> <br />
                    <input type="text" name="listItem"> <br />
                    <button type="submit">Save Item</button>

                </form>

                @foreach ($listItems as $listItem)
                <div class="flex" style="align-items: center;">
                    <p>Item: {{ $listItem->name }}</p>

                    <form method="post" action="{{ route('markComplete', $listItem->id) }}" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <button type="submit" style="max-height: 25px; margin-left: 20px;">Complete</button>
                    </form>

                </div>
                @endforeach

                <div id="completed-items">

                    {{--! Här existerar inte variablen $completedItems, vilket stör mig som fan, --}}
                    {{--! men jag vet inte hur jag ska lösa skiten bruh --}}
                    
                    @foreach ($completedItems as $completedItem)
                    <p>Completed item: {{ $completedItem->name }}</p>
                    
                    <form method="post" action="{{ route('removeItem', $completedItem->id) }}" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <button type="submit" style="max-height: 25px; margin-left: 20px;">Remove</button>
                    </form>
                    @endforeach

                    @if ($completedItems->count() >= 1 && $listItems->count() >= 1)    
                    <form method="post" action="{{ route('removeAll', $listItem->id) }}" accept-charset="UTF-8">
                        {{ csrf_field() }}
                        <button type="submit" style="max-height: 25px; margin-left: 20px;">Remove All</button>
                    </form>
                    @endif

                </div>

            </div>

        </div>

    </body>

</html>