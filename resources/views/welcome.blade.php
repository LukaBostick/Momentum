@extends("layouts.app")

@section("content")
    <main>
        <div class="relative flex flex-col h-screen items-center justify-center bg-white dark:bg-black transition-bg">
            <div class="absolute inset-0 overflow-hidden">
                <div class="jumbo absolute -inset-2.5 opacity-50"></div>
            </div>
            <h1 class=" flex items-center text-5xl font-bold text-gray-800 dark:text-white dark:opacity-80 transition-colors">
                Timeless Projects
            </h1>
            <h1 class="relative flex items-center text-5xl font-bold text-gray-800 dark:text-white dark:opacity-80 transition-colors">
            <span class="ml-1 rounded-xl bg-current p-2 text-[0.7em] leading-none">
                <span class="text-white dark:text-black">New & Old</span>
            </span>
            </h1>
            <h1 class=" flex items-center text-5xl font-bold text-gray-800 dark:text-white dark:opacity-80 transition-colors">

            </h1>
            <div class="mt-4">
                <button  class="px-3 py-1 border border-stone-200 rounded-full shadow-sm text-sm text-stone-800 dark:text-white bg-white/40 dark:bg-black/40 backdrop-blur-lg hover:border-stone-300 transition-colors dark:border-stone-500 dark:hover:border-stone-400">
                    <a href="https://momentum:8890/" class="text-inherit no-underline">Create Retro Projects</a>
                </button>
                <button class="px-3 py-1 border border-stone-200 rounded-full shadow-sm text-sm text-stone-800 dark:text-white bg-white/40 dark:bg-black/40 backdrop-blur-lg hover:border-stone-300 transition-colors dark:border-stone-500 dark:hover:border-stone-400 ml-2">
                    <a href="/projects" class="text-inherit no-underline">Create Modern Projects</a>
                </button>
            </div>
        </div>


    </main>
    <script>

        colorjs.prominent(document.querySelector("img"), {amount : 4, format: 'hex'}).then(colors => {
            console.log(colors);

            var ambiant = document.querySelector(".ambiant")
            var ambiant2 = document.querySelector(".ambiant2")
            var squares = document.querySelectorAll(".square")

            ambiant.style.background = "linear-gradient(0deg, " + colors[0] + ", " + colors[1] + ")";
            ambiant2.style.background = "linear-gradient(0deg, " + colors[2] + ", " + colors[3] + ")";

            squares[0].style.background = colors[0]
            squares[1].style.background = colors[1]
            squares[2].style.background = colors[2]
            squares[3].style.background = colors[3]

        })

        console.log("v145");
    </script>
@endsection
