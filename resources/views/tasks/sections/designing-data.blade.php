<div class="max-w-4xl mx-auto bg-white shadow rounded-xl overflow-hidden">
    <table class="w-full border border-gray-200">
        <tbody class="divide-y divide-gray-200">
            <tr>            <!-----Updated Pdf modal-------->
   <div x-data="{isModalOpen{{$task->id}}: false}">
                
  <button class="px-4 py-3 text-sm font-medium text-white rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600" @click="isModalOpen{{$task->id}} = !isModalOpen{{$task->id}}" >
   Upload Updated Pdf
  </button>
  <div x-show="isModalOpen{{$task->id}}" class="fixed inset-0 flex items-center justify-center p-5 overflow-y-auto modal z-99999" style="display: none;">
    <div class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
    <div @click.outside="isModalOpen{{$task->id}} = false" class="relative w-full max-w-[584px] rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10">
      <!-- close btn -->
      <button @click="isModalOpen{{$task->id}} = false" class="group absolute right-3 top-3 z-999 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-200 text-gray-500 transition-colors hover:bg-gray-300 hover:text-gray-500 dark:bg-gray-800 dark:hover:bg-gray-700 sm:right-6 sm:top-6 sm:h-11 sm:w-11">
        <svg class="transition-colors fill-current group-hover:text-gray-600 dark:group-hover:text-gray-200" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M6.04289 16.5413C5.65237 16.9318 5.65237 17.565 6.04289 17.9555C6.43342 18.346 7.06658 18.346 7.45711 17.9555L11.9987 13.4139L16.5408 17.956C16.9313 18.3466 17.5645 18.3466 17.955 17.956C18.3455 17.5655 18.3455 16.9323 17.955 16.5418L13.4129 11.9997L17.955 7.4576C18.3455 7.06707 18.3455 6.43391 17.955 6.04338C17.5645 5.65286 16.9313 5.65286 16.5408 6.04338L11.9987 10.5855L7.45711 6.0439C7.06658 5.65338 6.43342 5.65338 6.04289 6.0439C5.65237 6.43442 5.65237 7.06759 6.04289 7.45811L10.5845 11.9997L6.04289 16.5413Z" fill=""></path>
        </svg>
      </button>

      <form method="POST" enctype="multipart/form-data" action="{{route('update.designing.pdf',$task->id)}}">
         @csrf 
        <h4 class="mb-6 text-lg font-medium text-gray-800 dark:text-white/90">
          Upload Pdf
        </h4>

        <div  x-data="{ file: null,
    handleFile(e) {
      this.file = e.target.files[0]
    },
    remove() {
      this.file = null
      $refs.input.value = ''
    }
  }"   
  class="space-y-3">

  <label class="form-label">Upload Updated Kitchen Layout (PDF)</label>

  <!-- Upload Box -->
  <label
    class="flex flex-col items-center justify-center border-2 border-dashed rounded-lg p-6 cursor-pointer
           bg-gray-50 hover:bg-gray-100 transition"
  >
    <input
      x-ref="input"
      type="file"
      name="updated_pdf"
      class="hidden"
      @change="handleFile"
    />

    <template x-if="!file">
      <div class="text-center">
        <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 4v12m6-6H6" />
        </svg>
        <p class="text-sm text-gray-600">Click to upload</p>
        <p class="text-xs text-gray-400">PDF</p>
      </div>
    </template>

    <!-- File Preview -->
    <template x-if="file">
      <div class="flex items-center gap-3">
        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 16V4a2 2 0 012-2h8l6 6v8a2 2 0 01-2 2H6a2 2 0 01-2-2z" />
        </svg>
        <div>
          <p class="text-sm font-medium" x-text="file.name"></p>
          <p class="text-xs text-gray-500"
             x-text="(file.size/1024).toFixed(1) + ' KB'"></p>
        </div>
      </div>
    </template>
  </label>

  <!-- Remove Button -->
  <template x-if="file">
    <button
      type="button"
      @click="remove"
      class="text-sm text-red-500 hover:text-red-700"
    >
      Remove file
    </button>
  </template>
</div>
 
       <input type="hidden" name="updated_by" value="{{auth()->user()->id}}">
       <input type="hidden" name="updated_pdf_user_role" value="{{Auth::user()->userdetails->department->name}}">
        <div class="flex items-center justify-end w-full gap-3 mt-6">
          <button  @click="isModalOpen = false" type="button" class="flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 shadow-theme-xs transition-colors hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 sm:w-auto">
            Close
          </button>
          <button type="submit" class="flex justify-center w-full px-4 py-3 text-sm font-medium text-white rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600 sm:w-auto">
            Save Changes
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-----Updated Pdf modal--------></tr>
             <tr>
                <th class="px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Layout Files
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                   <!-- EXISTING IMAGES -->
                   @if(isset($designing->images) )

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                        @foreach($designing->images as $img)

                                <a href="{{ asset($img->image_path) }}"
                                target="_blank"
                                download
                                class="block mt-1 text-blue-600 underline">
                                    Download
                                </a>
                        @endforeach
                    </div>
                    @endif
              <!-- <a href="{{ asset($designing->layout_pdf) }}" download>Download Pdf</a> -->
                </td>
            </tr>
            
            @if(isset($designing->updated_pdf))
            <tr>
                <th class="px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Updated PDF
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                <a href="{{ asset($designing->updated_pdf) }}" download>Download {{$designing->updated_pdf_user_role}} Pdf</a>
                </td>
            </tr>
            @endif

            <tr>
                <th class="w-1/3 px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Customer Name
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                    {{ $designing->name }}
                </td>
            </tr>
           @if(in_array(auth()->user()->userDetails->role->name, ['Admin','Employees']))
           @if(in_array(auth()->user()->userDetails->department->slug, ['designings', 'admin']))
            <tr>
                <th class="px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Email
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                    {{ $designing->email ?? 'None' }}
                </td>
            </tr>

            <tr>
                <th class="px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Phone Number
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                    {{ $designing->phone_no ?? 'None' }}
                </td>
            </tr>
               <tr>
                <th class="px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Address
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                   {{ $designing->address ?? 'None' }}
                </td>
            </tr>
            @endif
            @endif
            <tr>
                <th class="px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Delivery Date
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                    @if(isset($designing->installation_date))
                    {{ $designing->installation_date->format('d M Y') }}
                    @else
                    {{'None'}}
                    @endif
                </td>
            </tr>
            <tr>
                <th class="px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Lock Code
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">

                    {{ $designing->lock_code ?? 'None' }}
                </td>
            </tr>
         

            

            <tr>
                <th class="px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Material Type
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                    {{ $designing->material ?? 'None' }}                
                </td>
            </tr>
            <tr>
                <th class="px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Tape
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                    {{ $designing->tape ?? 'None' }} 
                </td>
            </tr>
            <tr>
                <th class="px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Handel Name & Size
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                   {{ $designing->handel ?? 'None' }} 
                </td>
            </tr>
            <tr> 
                <th colspan="2" class="text-center px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600" style="text-align: center;">
                    <span class="text-center">Kitchen Color</span>
                </th>
            </tr>
            <tr>
                <th class="px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Upper Cabinet
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                    {{ $designing->KitchenColor->upper_cabinet ?? 'None' }} 
                </td>
            </tr>
             <tr>
                <th class="px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Riser
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                     {{ $designing->KitchenColor->riser ?? 'None' }} 
                </td>
            </tr>
            <tr>
                <th class="px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Base Cabinet
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                    {{ $designing->KitchenColor->base_cabinet ?? 'None'}}
                </td>
            </tr>
             <tr>
                <th class="px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Handle
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                    {{ $designing->KitchenColor->handle ?? 'None'}}
                </td>
            </tr>
            <tr>
                <th class="px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Island
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                    {{ $designing->KitchenColor->island ?? 'None'}}
                </td>
            </tr>
             <tr>
                <th class="px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                     Garbage Bin
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                    {{ $designing->KitchenColor->garbage_bin ?? 'None'}}
                </td>
            </tr>
           
            <tr>
                <th class="px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Upper Cabinet
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                    {{ $designing->KitchenColor->upper_cabinet ?? 'None'}}
                </td>
            </tr>
            <tr>
                <th class="px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Riser
                </th>
                <td class="px-4 py-3 text-sm text-gray-800">
                    {{ $designing->KitchenColor->riser ?? 'None'}}
                </td>
            </tr>

          <!--   <tr>
                <th class="px-4 py-3 bg-gray-50 text-left text-sm font-semibold text-gray-600">
                    Status
                </th>
                <td class="px-4 py-3">
                    @if ($designing->status === 'completed')
                        <span class="inline-flex px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                            Completed
                        </span>
                    @else
                        <span class="inline-flex px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-700">
                            Pending
                        </span>
                    @endif
                </td>
            </tr> -->

        </tbody>
    </table>
</div>
@if(in_array(auth()->user()->userDetails->role->name, ['Admin','Employees']))
@if(in_array(auth()->user()->userDetails->department->slug, ['designings', 'admin']))
<a href="?edit-designing=true" type="button" class="shadow-theme-xs flex w-full justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
<svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
  <path d="M12.8861 5.08135L15.4182 7.61345M16.1437 3.59219L16.908 4.35652C17.3962 4.84468 17.3962 5.63613 16.908 6.12429L8.33547 14.6968C8.19039 14.8419 8.01182 14.9491 7.81554 15.0088L4.47461 16.0256L5.49141 12.6847C5.55115 12.4884 5.65829 12.3098 5.80337 12.1647L14.3759 3.59219C14.8641 3.10404 15.6555 3.10404 16.1437 3.59219Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
  Edit Designing
</a>
@endif
@endif
