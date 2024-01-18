@foreach ($students as $student)
    <tr class="bg-white border-b">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                {{ ($students->currentPage() - 1) * $students->perPage() + $loop->index + 1 }}
            </th>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                {{$student->name ?? '-'}}
            </th>
            <td class="px-6 py-4">
                {{$student->gender ?? '-'}}
            </td>
            <td class="px-6 py-4">
                {{dateFormat($student->created_at) ?? '-'}}
            </td>
            <td class="px-6 py-4">
                <a href="#" data-route="{{ route('student-delete', $student->id) }}" data-redirect-route="student/list" class="deleteAction">
                    <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-6 py-1 me-2 mb-2">Delete</button>
                </a>
            </td>
    </tr>
@endforeach