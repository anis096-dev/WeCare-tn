<x-guest-layout>
  <section class="divide-y text-gray-900">
    <!-- header --> 
    <div id="header" class="relative bg-white overflow-hidden pb-2">
        <div class="max-w-full mx-auto">
            <div class="relative z-10 pb-8 bg-transparent sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="text-center lg:text-left rtl:lg:text-right">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block xl:inline text-4xl">{{__('Organize your home care')}}</span>
                        <span class="block text-indigo-600 xl:inline text-4xl">{{__('thanks to our online care request')}}</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-lg lg:mx-0">
                            {{__('How it works ? it is very simple ! All you need to do is create a care request with a Health specialist by clicking on (Make an appointment). Once your care request has been created, it is sent to the Health specialists closest to you. As soon as a Health specialist validates the care, you are put in contact.')}}
                        </p>
                        <button class="mt-5 sm:mt-8 sm:flex sm:justify-center justify-start animate-pulse p-4 font-bold bg-blue-50 border-4 border-blue-400 rounded-full hover:bg-blue-200 hover:border-blue-600" >{{__('Booking now!')}}</button>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 ltr:lg:right-0 rtl:lg:left-0 lg:w-1/2">
            <img class="z-10 h-65 w-full ltr:rounded-b-full ltr:rounded-bl-full ltr:rounded-l-full rtl:rounded-b-full rtl:rounded-br-full rtl:rounded-r-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full shadow-2xl" src="{{url('/img/i88936-.jpeg')}}" alt="Image">
        </div>
    </div>

    <!-- Statistics -->
    <div class="text-gray-600 bg-white body-font">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-col text-center w-full mb-20">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{__('Statistics')}}</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base"></p>
          </div>
          <div class="flex flex-wrap -m-4 text-center">
            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
              <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class=" animate-bounce text-indigo-500 w-12 h-12 mb-3 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <h2 class="title-font font-medium text-3xl text-gray-900">{{App\Models\User::count()}}</h2>
                <p class="leading-relaxed">{{__('Appointments')}}</p>
              </div>
            </div>
            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
              <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class=" animate-pulse text-indigo-500 w-12 h-12 mb-3 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" 
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                    </svg>
                <h2 class="title-font font-medium text-3xl text-gray-900">{{App\Models\Specialty::count()}}</h2>
                <p class="leading-relaxed">{{__('Health specialist')}}</p>
              </div>
            </div>
            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class=" animate-pulse text-indigo-500 w-12 h-12 mb-3 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                  <h2 class="title-font font-medium text-3xl text-gray-900">{{App\Models\Treatment::count()}}</h2>
                  <p class="leading-relaxed">{{__('Patients')}}</p>
                </div>
            </div>
            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
              <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class=" animate-pulse text-indigo-500 w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <h2 class="title-font font-medium text-3xl text-gray-900">{{App\Models\Specialty::count()}}</h2>
                <p class="leading-relaxed">{{__('Specialties')}}</p>
              </div>
            </div>
          </div>
        </div>
    </div>
    
  </section>
</x-guest-layout>
