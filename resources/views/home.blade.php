<x-layouts.app>
    <div class="chat">
        <div class="row align-items-center p-2">
            <div class="p-3 icon-item icon-none col-6">
                <i data-feather="menu" class="icon-dual sidebar-open" style="cursor:pointer"></i>
            </div>
            <div class="icon-item text-right col-6 col-xl-12">
                <a href="{{route('logout')}}">
                    <i data-feather="log-out" class="icon"></i>
                </a>
            </div>
        </div>
        <div style="margin-top : 40vh">
            <h1 class="text-center text-logo" style="font-size: 60px">Larachat</h1>
        </div>
    </div>
</x-layouts.app>
