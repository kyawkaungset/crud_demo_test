<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>

    <div class="relative overflow-x-auto">
        <form class="max-w-sm mx-auto" action="{{route('student-store')}}" method="POST">
            @csrf
            {{-- name/text --}}
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><span class="text-red-600">*</span>Name</label>
                <input type="text" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="name@flowbite.com" id="nameInputElement">
                @error('name')
                    <span class="text-red-600">{{$message}}</span>
                @enderror
            </div>
            
            {{-- gender/radio --}}
            <div class="border p-3 mb-3">
                <div class="flex items-start mb-5">
                    <div class="flex items-center h-5">
                        <input type="radio" value="Male" name="gender"
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                            id="genderInputElement">
                    </div>
                    <label for="gender" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300" >Male</label>
                    
                </div>
    
                <div class="flex items-start mb-5">
                    <div class="flex items-center h-5">
                        <input type="radio" value="Female" name="gender"
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                            >
                    </div>
                    <label for="gender" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300" >Female</label>
                    
                </div>
    
                <div class="flex items-start mb-5">
                    <div class="flex items-center h-5">
                        <input type="radio" value="Others" name="gender"
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                            >
                    </div>
                    <label for="gender" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300" >Others</label>
                    
                    @error('gender')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
            </div>
            

            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
    
</body>
</html>
