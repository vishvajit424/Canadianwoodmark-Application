<div class="max-w-4xl mx-auto bg-white shadow rounded-xl overflow-hidden">
    <table class="w-full border border-gray-200">
        <tbody class="divide-y divide-gray-200">
          <tr>
                <th class="w-1/3 px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                      Special Instructions
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                    {{$installing->special_instructions}}
                    
                </td>
            </tr>
            <tr>
                <th class="w-1/3 px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Missing stuff on job
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                 {{$installing->missing_stuff}}
                </td>
            </tr>
        </tbody>
    </table>

</div>
<h3 class="text-center">Task is Complete</h3>

