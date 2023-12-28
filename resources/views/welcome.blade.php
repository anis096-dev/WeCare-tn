<x-guest-layout>
  <section class="divide-y text-gray-900">
    <!-- header --> 
    <div class="relative bg-white dark:text-white dark:bg-gray-900 overflow-hidden pb-2">
        <div class="max-w-full mx-auto">
            <div class="relative z-10 pb-8 bg-transparent sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="text-center lg:text-left rtl:lg:text-right">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block xl:inline text-4xl dark:text-white">{{__('Organize your home care')}}</span>
                        <span class="block text-indigo-600 xl:inline text-4xl">{{__('thanks to our online care request')}}</span>
                        </h1>
                        <p class="mt-3 mb-10 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-lg lg:mx-0">
                            {{__('How it works ? it is very simple ! All you need to do is create a care request with a Health specialist by clicking on (Make an appointment). Once your care request has been created, it is sent to the Health specialists closest to you. As soon as a Health specialist validates the care, you are put in contact.')}}
                        </p>
                        <a href="#rdv" class="animate-pulse p-4 font-bold bg-blue-50 border-4 border-blue-400 rounded-full hover:bg-blue-200 hover:border-blue-600 dark:text-gray-700" >{{__('Booking now!')}}</a>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 ltr:lg:right-0 rtl:lg:left-0 lg:w-1/2">
            <img class="z-10 h-65 w-full ltr:rounded-b-full ltr:rounded-bl-full ltr:rounded-l-full rtl:rounded-b-full rtl:rounded-br-full rtl:rounded-r-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full shadow-2xl" src="{{url('/img/i88936-.jpeg')}}" alt="Image">
        </div>
    </div>

    <!-- Statistics -->
    <div class="text-gray-600 bg-white dark:text-gray-200 dark:bg-gray-900 body-font">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-col text-center w-full mb-20">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{__('Statistics')}}</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag.</p>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base"></p>
          </div>
          <div class="flex flex-wrap justify-center text-center px-5 w-full">
            <div class="md:w-1/4 sm:w-1/2 w-full">
              <div class="px-4 py-6">
                <svg xmlns="http://www.w3.org/2000/svg" class=" animate-bounce text-indigo-500 w-10 h-10 mb-3 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <h2 class="title-font font-medium text-3xl text-gray-900 dark:text-white">{{App\Models\User::count()}}<span class="font-bold">+</span></h2>
                <p class="leading-relaxed">{{__('Appointments')}}</p>
              </div>
            </div>
            <div class="md:w-1/4 sm:w-1/2 w-full">
              <div class="px-4 py-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class=" animate-pulse text-indigo-500 w-10 h-10 mb-3 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" 
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                    </svg>
                <h2 class="title-font font-medium text-3xl text-gray-900 dark:text-white">{{App\Models\Specialty::count()}}<span class="font-bold">+</span></h2>
                <p class="leading-relaxed">{{__('Health specialist')}}</p>
              </div>
            </div>
            <div class="md:w-1/4 sm:w-1/2 w-full">
                <div class="px-4 py-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class=" animate-pulse text-indigo-500 w-10 h-10 mb-3 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                  <h2 class="title-font font-medium text-3xl text-gray-900 dark:text-white">{{App\Models\Treatment::count()}}<span class="font-bold">+</span></h2>
                  <p class="leading-relaxed">{{__('Patients')}}</p>
                </div>
            </div>
          </div>
        </div>
    </div>
    
    <!-- RDV -->
    <div id="rdv" class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-col text-center w-full mb-10">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{__('Get Your Appointment')}}</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{__('We will Find an available Health specialist near you!!')}}</p>
            <div class="grid grid-flow-col sm:flex-row items-center justify-center mt-2 mb-2">
                @forelse(App\Models\Specialty::All() as $item)
                <div x-data="{open: false}" class="relative">
                    <!-- Trigger element -->
                    <button @mouseover="open = true" @mouseleave="open = false"
                    class="bg-indigo-600 px-2 py-2 ml-2 mb-2 rounded text-white text-sm font-bold items-center focus:bg-indigo-400">
                        {{ $item->name }}
                    </button>
                    <!-- Popover -->
                    <!-- Make sure to add the requisite CSS for x-cloak: https://github.com/alpinejs/alpine#x-cloak -->
                    <div x-cloak x-show.transition="open" id="popover"
                    class="p-3 space-y-1 max-w-xl bg-white rounded shadow-2xl flex flex-col text-sm text-gray-600 mt-3 absolute z-50">
                        <strong class="text-sm text-gray-800 font-semibold">What's his role?</strong>
                        <p>{{$item->desc}}</p>
                    </div>  
                </div>
                @empty
                <button>{{__('empty..')}}</button>
                @endforelse
            </div>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base underline font-bold">{{__('SIMPLE, FAST AND SECURE !')}}</p>
          </div> 
          <div class="flex flex-col text-center w-full mb-10">
            @livewire('guest.appointment.appointment-create')
          </div>
        </div>
        
        <script src="https://unpkg.com/@popperjs/core@2.9.1/dist/umd/popper.min.js" charset="utf-8"></script>
        <script>
            function openPopover(event,popoverID){
            let element = event.target;
            while(element.nodeName !== "BUTTON"){
            element = element.parentNode;
            }
            var popper = Popper.createPopper(element, document.getElementById(popoverID), {
            placement: 'top'
            });
            document.getElementById(popoverID).classList.toggle("hidden");
            }
        </script>
    </div>
  </section>
</x-guest-layout>
