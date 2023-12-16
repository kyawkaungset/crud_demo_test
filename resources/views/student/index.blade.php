<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    
    <link rel="stylesheet" type="text/css" href="{{asset('css/toastr.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/fontawesome.css')}}" />
    <script src="{{ asset('js/fontawesome.js') }}"></script>

    @livewireStyles
</head>

<body>
    <div class="container">
        <div class="flex items-center">
            <input type="text" placeholder="Search..." class="mx-4 mt-4 px-2 py-1 border input input-bordered input-warning w-full max-w-xs rounded-md" id="searchInputElement"/>
            
        </div>
        <div>
            <a href="{{url('/telescope')}}">
                <button type="button" class="mx-4 mt-4 px-2 py-1focus:outline-none text-white bg-green-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  py-1 me-2 mb-2 dark:bg-bule-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900"><i class="fa-brands fa-searchengin"></i>Laravel Telescope</button>
            </a>
        </div>
        <div>
            <a href="{{route('student-create')}}">
                <button type="button" class="mx-4 mt-4 px-2 py-1focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  py-1 me-2 mb-2 dark:bg-bule-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">Create a student</button>
            </a>
        </div>
        <div>
            <h2 class="text-right mr-20">Total Student : <span class=" text-red-600 text-[20px]">{{$student_count}}</span></h2>
        </div>

        {{-- export with spatie sample excel --}}
        <div>
            <a href="{{route('student-export')}}">
                <button type="button" class="mx-4 mt-4 px-2 py-1focus:outline-none text-white bg-orange-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  py-1 me-2 mb-2 dark:bg-bule-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">Spatie Export</button>
            </a>
        </div>
        {{-- export with Laravel Job and Livewire --}}
        @livewire('export')

        <div class="mt-8 mx-4">
            <span class="text-lg font-bold">Laravel Excel Import</span>
            <form action="{{ route('student-import') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="file" name="file" required>

                <x-button>Import</x-button>
            </form>
        </div>

    @if($students != null)
        <div class="relative overflow-x-auto mt-6">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Gender
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created At
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody id="searchResults">
                    @include('student.search')
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-12 mt-4">
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    @endif
    </div>
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/toastr.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>
    <script src="{{ asset('js/DeleteAction.js') }}"></script>

    <script>
        toastr.options.timeOut = 1000;

        @if(Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
        @elseif(Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
        @endif
    </script>
    <script>
        // events - input, change, click, keyup, keydown
        $('#searchInputElement').on('input', function(){
            var searchInput = $(this).val();

            $.ajax({
                url: "{{ route('student-index') }}",
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {
                    search: searchInput,
                },
                success: function(response) {
                    $("#searchResults").html(response.html);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                },
            });

        });
        
    </script>
    @livewireScripts
</body>

</html>

