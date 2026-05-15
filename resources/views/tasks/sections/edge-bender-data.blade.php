<div class="max-w-4xl mx-auto bg-white shadow rounded-xl overflow-hidden">
    <table class="w-full border border-gray-200">
        <tbody class="divide-y divide-gray-200">
             <tr>
                <th class="px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Edge Bender Start
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                   {{ $edge->timer_start }}
                </td>
            </tr>

            <tr>
                <th class="w-1/3 px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                     Edge Bender End
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                    {{ $edge->end_time }}
                </td>
            </tr>
            <tr>
                <th class="w-1/3 px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                     Total Time
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                    {{ $edge->total_time }}
                </td>
            </tr>
             <tr>
                <th class="w-1/3 px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Missing Pieces
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                    {{ $edge->missing_pieces }}
                </td>
            </tr>
            <tr>
                <th class="w-1/3 px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Special Instructions
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                    {{ $edge->special_instructions }}
                </td>
            </tr>
            <tr>
                <th class="px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Status
                </th>
                <td class="px-4 py-3">
                    @if ($edge->status === 'completed')
                        <span class="inline-flex px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                            Completed
                        </span>
                    @else
                        <span class="inline-flex px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700">
                            Pending
                        </span>
                    @endif
                </td>
            </tr>

        </tbody>
    </table>
</div>
<a href="?edit-edge-bender=true" type="button" class="shadow-theme-xs flex w-full justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
<svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
  <path d="M12.8861 5.08135L15.4182 7.61345M16.1437 3.59219L16.908 4.35652C17.3962 4.84468 17.3962 5.63613 16.908 6.12429L8.33547 14.6968C8.19039 14.8419 8.01182 14.9491 7.81554 15.0088L4.47461 16.0256L5.49141 12.6847C5.55115 12.4884 5.65829 12.3098 5.80337 12.1647L14.3759 3.59219C14.8641 3.10404 15.6555 3.10404 16.1437 3.59219Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
  Edit Edge Bender
</a>
