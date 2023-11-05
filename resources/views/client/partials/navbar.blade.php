<nav class="hidden md:flex justify-between items-center md:px-10 py-2 shadow-md bg-white w-full">
    <div>
        <a href="/">
            <img src="{{asset('/assets/dist/img/logo.png')}}" alt="logo" class="h-[60px]">
        </a>
    </div>
    <div>
        <ul class="flex justify-between items-center gap-10">
            <li>
                <a href="/" class="text-md font-medium">
                    Home
                </a>
            </li>
            <li>
                <a href="/about-us" class="text-md font-medium">
                    About Us
                </a>
            </li>
            <li class="relative">
                <p class="text-md font-medium cursor-pointer service_dropdown">
                    Services
                    <i class="fa-solid fa-chevron-down fa-sm transform transition-transform"></i>
                </p>
                <ul class="dropdown-menu hidden absolute mt-2 bg-white min-w-[250px] border rounded-lg shadow-md transition-transform transform origin-top duration-300 scale-y-0">
                    <li class="py-2 px-4 hover:bg-gray-100"><a href="/school-registration">School Registration</a></li>
                    {{-- <li class="py-2 px-4 hover:bg-gray-100"><a href="#">NGO Registration</a></li>
                    <li class="py-2 px-4 hover:bg-gray-100"><a href="#">Companies Registration</a></li> --}}
                    <li class="py-2 px-4 hover:bg-gray-100"><a href="/teacher-training">Teacher's Training</a></li>
                    <li class="py-2 px-4 hover:bg-gray-100"><a href="/#contact">Hygienic Certificate</a></li>
                    <li class="py-2 px-4 hover:bg-gray-100"><a href="/#contact">Building Fitness Certificate</a></li>
                </ul>
            </li>            
            
            <li>
                <a href="#contact" class="text-md font-medium">
                    Contact Us
                </a>
            </li>
            <li>
                <a href="{{route('auth.index')}}" class="text-md font-medium">
                    Login
                </a>
            </li>
        </ul>
    </div>
</nav>

{{-- mobile --}}
<nav class="flex md:hidden justify-between items-center px-10 py-2 bg-white">
    <div>
        <a href="/">
            <img src="{{asset('/assets/dist/img/logo.png')}}" alt="logo" class="h-[60px]">
        </a>
    </div>
    <div>
        <button class="cursor-pointer">
            <i class="fa-solid fa-bars fa-2xl"></i>
        </button>
    </div>
</nav>