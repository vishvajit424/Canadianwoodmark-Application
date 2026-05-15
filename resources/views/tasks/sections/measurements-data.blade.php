  <!-- COMMENT -->
  <div class="bg-white border rounded-xl p-5">
    <h3 class="text-sm font-semibold text-gray-700 mb-2">Comment</h3>

    @if($measurement->comment)
      <p class="text-gray-700">{{ $measurement->comment }}</p>
    @else
      <p class="text-sm text-gray-400 italic">No comment provided</p>
    @endif
  </div>

  <!-- IMAGES -->
  <div class="bg-white border rounded-xl p-5">
    <h3 class="text-sm font-semibold text-gray-700 mb-4">
      Uploaded Images ({{ $measurement->images->count() }})
    </h3>
<div class="border-t border-gray-100 p-4 sm:p-6 dark:border-gray-800">
   <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">
                    @foreach($measurement->images as $img)
  <div>
      <a href="{{ asset($img->image_path) }}" 
                download 
                class="inline-block w-full text-center rounded-lg bg-blue-600 text-white text-xs py-2 hover:bg-blue-700">
    <img src="{{ asset($img->image_path) }}" alt="image grid" class="rounded-xl border border-gray-200 dark:border-gray-800">
  </a>
  </div>
@endforeach

</div>
</div>
  </div>
  <a href="?edit-measurement=true" type="button" class="shadow-theme-xs flex w-full justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
<svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
  <path d="M12.8861 5.08135L15.4182 7.61345M16.1437 3.59219L16.908 4.35652C17.3962 4.84468 17.3962 5.63613 16.908 6.12429L8.33547 14.6968C8.19039 14.8419 8.01182 14.9491 7.81554 15.0088L4.47461 16.0256L5.49141 12.6847C5.55115 12.4884 5.65829 12.3098 5.80337 12.1647L14.3759 3.59219C14.8641 3.10404 15.6555 3.10404 16.1437 3.59219Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
  Edit Measurement
</a>