<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Planos
        </h2>
    </x-slot>

   

    <div class="py-12">

        @foreach($plans as $plan)
        <div>
            <a href="{{ route('payments', ['plan' => $plan->identifier]) }}">{{$plan->title}}</a>
        </div>
    @endforeach
        <div class="flex flex-wrap mx-auto mt-12 max-w-7xl bg-gray-400"> 
    
            <div class=" bg-gray-200 w-full max-w-md px-0 mx-auto mb-6 lg:w-1/3 lg:px-3 lg:mb-0"> 1</div> 
            <div class="w-full max-w-md px-0 mx-auto mb-6 lg:w-1/3 lg:px-3 lg:mb-0">2</div>
             <div class="w-full max-w-md px-0 mx-auto mb-6 lg:w-1/3 lg:px-3 lg:mb-0">3</div>
            
            
            </div>
              
        <!--<x-jet-welcome />-->
    </div>
</div>
</div>
</x-app-layout>



    