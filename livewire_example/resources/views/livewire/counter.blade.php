<div class="m-2 p-2 flex flex-col border-4 border-double border-slate-800
    lg:flex lg:flex-row lg:justify-center">
    <div class="m-2 p-1 text-teal-800 text-center bg-lime-200 text-2xl
        lg:w-full lg:text-5xl">
        {{ $count }}
    </div>

    <button wire:click = "increment" class="p-2 m-2 bborder-double border-4 border-sky-500 bg-sky-100
            lg:rounded-full lg:border-none lg:bg-purple-200 lg:text-purple-950 lg:font-bold lg:p-4">
        Incrementar
    </button>        
</div>
