<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            abonnee
        </h2>
    </x-slot>

    <div class="py-12 my-12 mx-20 px-12 bg-white rounded-md">
        @if (Auth::user()->subscribed('default'))
        role {{Auth::user()}}
        @endif
        <div class="flex flex-wrap mx-auto mt-12 max-w-7xl "> 
   
            
            </div>
           
                <!--<x-jet-welcome />-->
            </div>
        </div>
    </div>
</x-app-layout>
