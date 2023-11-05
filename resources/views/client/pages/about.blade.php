@extends('client.layout')

@section('content')
    <section>
        <div class="flex flex-col md:flex-row justify-center items-center pt-44 md:pt-40 md:px-10">
            <div class="w-[40%]">
                <img src="{{asset('/assets/dist/img/about-img.jpeg')}}" class="w-[400px] rounded-md" alt="">
            </div>
            <div class="w-[60%]">
                <div>
                    <p class="text-sm text-gray-500 text-center md:text-left">OUR MISSION</p>
                    <h1 class="text-4xl font-semibold text-center md:text-left">About Us</h1>
                    <p class="text-sm text-gray-500 pt-3 pb-8 text-justify md:text-left">
                        Registrations.pk is a working frame branch of the EDU-RESOURCE ASSOCIATES that is registered firm with the District Government, Rawalpindi and with Govt. of Punjab as well its area of work is based on educational domain, trainings, publications etc.
                    </p>
                    <p class="text-sm text-gray-500 pb-8 text-justify md:text-left">
                        The concept of the Registration.org has come out of our bitter experience with respect to get registration of any kind from any kind of government department. The people always face many troubles to grant of registration certificate whether this certificate many be of school, college, firm, company, industrial, etc. So I personally observed some old men and old women even standing in long queue of waiting candidates.
                    </p>
                    <p class="text-sm text-gray-500 pb-8 text-justify md:text-left">
                        The pain and price state made us be also to redeem about establishing this kind of organization that may help those people who are law abiding citizen of Pakistan and desirous to fellow legal and correct way for getting registration they deserve for our guideline and help for this “Registrations.pk” is approved firm by district government Rawalpindi. Government accepts as consultancy, our doors are open always for the people who are facing problem for getting any kind of registration and affiliation of educational institutions.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection