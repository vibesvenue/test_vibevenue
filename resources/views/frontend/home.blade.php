@extends('frontend.master', ['activePage' => 'home'])
@section('title', __('Home'))
@section('content')
    <div class="bg-scroll" style="background: linear-gradient(to bottom right, rgba(0, 0, 0, 1), rgba(0, 0, 0, 1));">
        <div class="w-full h-full m-auto ">
        <div class="pb-20 bg-scroll min-h-screen">

        <div class="mr-4 flex justify-end z-30">
            <a type="button" href="#" class="scroll-up-button bg-primary rounded-full p-4 fixed z-20  2xl:mt-[49%] xl:mt-[59%] xlg:mt-[68%] lg:mt-[75%] xxmd:mt-[83%] md:mt-[90%]
                xmd:mt-[90%] sm:mt-[117%] msm:mt-[125%] xsm:mt-[160%]">
                <img src="http://localhost/images/downarrow.png" alt="" class="w-3 h-3 z-20">
            </a>
        </div>
        <div class="mt-5 3xl:mx-52 2xl:mx-28 1xl:mx-28 xl:mx-36 xlg:mx-32 lg:mx-36 xxmd:mx-24 xmd:mx-32 md:mx-28 sm:mx-20 msm:mx-16 xsm:mx-10 xxsm:mx-5 z-10 relative">
            <div class="flex sm:space-x-6 msm:space-x-0 xxsm:space-x-0 xxmd:flex-row xmd:flex-col xxsm:flex-col">
                <div class="xxmd:w-2/3 xmd:w-full xxsm:w-full" style="background:white; border-radius:12px;">
                <div id="calendar" style="margin:20px;"></div>
                </div>
                </br></br>
                <div class="xxmd:w-1/3 xmd:w-full xxsm:w-full">
                    <div class="p-4 bg-white shadow-lg rounded-md">
                        <p class="font-poppins font-semibold text-2xl leading-8 text-black pb-3">Coming Events
                        </p>
                        <div class="grid lg:grid-cols-2 gap-y-5 xxmd:grid-cols-1 xmd:grid-cols-2 sm:grid-cols-2 msm:grid-cols-2 xxsm:grid-cols-1">
                            @foreach ($events as $item)
                            <a href="{{ url('event/' . $item->id . '/' . Str::slug($item->name)) }}" target="_blank" class="hover:cursor-pointer">
                                <div id="eventimage">

                                    <img src="{{ url('images/upload/' . $item->image) }}" class="1xl:w-40 1xl:h-24 xlg:h-16 xl:h-20 lg:w-[90%] lg:h-10 xxmd:w-full xxmd:h-32 xmd:w-[90%] msm:w-[90%] xxsm:w-full rounded-md object-cover bg-cover" alt="">
                                    <h4 style="color:#ffffff;">{{ $item->name }} </br><span>
                                    {{ Carbon\Carbon::parse($item->start_time)->format('d M Y') }}
                                    </span></h4>
                                </div>
                            </a>
                            @endforeach      
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

            <div
                class="xxmd:mt-20 3xl:mx-52 2xl:mx-28 1xl:mx-28 xl:mx-36 xlg:mx-32 lg:mx-36 xxmd:mx-24 xmd:mx-32 md:mx-28 sm:mx-20 msm:mx-16 xsm:mx-10 xxsm:mx-5 xmd:mt-60 xxmd:pt-0  z-10 relative">
                {{-- Latest Events --}}
                <div
                    class="absolute bg-blue blur-3xl opacity-10 s:bg-opacity-10 3xl:w-[370px] 3xl:h-[370px] 2xl:w-[300px] 2xl:h-[300px] 1xl:w-[300px] xmd:w-[300px] xmd:h-[300px] sm:w-[200px] sm:h-[300px] xxsm:w-[300px] xxsm:h-[300px] rounded-full -mt-5 2xl:-ml-20 1xl:-ml-20 sm:ml-2 xxsm:-ml-7">
                </div>
                <div class="flex sm:flex-wrap msm:flex-wrap xsm:flex-wrap xxsm:flex-wrap justify-between pt-20 mx-5 z-10">
                    <div class="">
                        <p
                            class="font-poppins font-semibold md:text-5xl xxsm:text-2xl xsm:text-2xl sm:text-2xl text-blue leading-1 ">
                            {{ __('Latest Event') }}</p>
                    </div>
                    <div class=" xxsm:max-sm:hidden">
                        <a type="button" href="{{ url('/all-events') }}"
                            class="px-10 py-3 text-blue border border-blue text-center font-poppins font-normal text-base leading-6 rounded-md flex">{{ __('See all') }}
                            <img src="{{ url('images/right.png') }}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                    </div>
                </div>
                @if (count($events) == 0)
                    <div class="font-poppins font-medium text-lg leading-4 text-black mt-5 ml-5 capitalize">
                        {{ __('There are no events added yet') }}
                    </div>
                @endif
                <div
                    class=" grid gap-x-7 3xl:grid-cols-4 xl:grid-cols-4 xlg:grid-cols-2 xxmd:grid-cols-2 xxmd:gap-y-7 xmd:gap-y-7 xxsm:gap-y-7 sm:grid-cols-1 sm:gap-y-7 msm:grid-cols-1 xxsm:grid-cols-1 justify-between pt-10">
                    @foreach ($events as $item)
                        <div
                            class="shadow-lg p-5 rounded-lg bg-white hover:scale-110 transition-all duration-500 cursor-pointer">
                            <a href="{{ url('event/' . $item->id . '/' . Str::slug($item->name)) }}">
                                <img src="{{ url('images/upload/' . $item->image) }}" alt=""
                                    class="h-40 rounded-lg w-full object-cover bg-cover ">
                                <p class="font-popping font-semibold text-xl leading-8 pt-2" style="color:#ffffff;">{{ $item->name }}
                                </p>
                                <p class="font-poppins  font-normal text-base leading-6 text-gray pt-1"  style="color:#ffffff;">
                                    {{ Carbon\Carbon::parse($item->start_time)->format('d M Y') }} -
                                    {{ Carbon\Carbon::parse($item->end_time)->format('d M Y') }}
                                </p>
                            </a>
                            <div class="flex justify-between mt-7">
                                @if (Auth::guard('appuser')->user())
                                    @if (Str::contains($user->favorite, $item->id))
                                        <a href="javascript:void(0);" class="like"
                                            onclick="addFavorite('{{ $item->id }}','{{ 'event' }}')"><img
                                                src="{{ url('images/heart-fill.svg') }}" alt=""
                                                class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                    @else
                                        <a href="javascript:void(0);" class="like"
                                            onclick="addFavorite('{{ $item->id }}','{{ 'event' }}')"><img
                                                src="{{ url('images/heart.svg') }}" alt=""
                                                class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                    @endif
                                @endif
                                <a type="button" href="{{ url('event/' . $item->id . '/' . Str::slug($item->name)) }}"
                                    class=" text-primary text-center font-poppins font-medium text-base leading-7 flex">{{ __('View Details') }}
                                    <img src="{{ url('images/right-purpal.png') }}" alt=""
                                        class="w-3 h-3 mt-1.5 ml-2"></a>
                            </div>
                        </div>
                        @if ($loop->iteration == 4)
                        @break
                    @endif
                @endforeach
                <div class="sm:hidden">
                    <a type="button" href="{{ url('/all-events') }}"
                        class="px-10 py-3 text-blue border border-blue text-center font-poppins font-normal text-base leading-6 rounded-md flex">{{ __('See all') }}
                        <img src="{{ url('images/right.png') }}" alt="" class="w-3 h-3 mt-1.5 ml-2"></a>
                </div>
            </div>
            {{-- Feature Categories --}}
            <div
                class="absolute bg-success blur-3xl opacity-10 s:bg-opacity-10 3xl:w-[370px] 3xl:h-[370px] 2xl:w-[300px] 2xl:h-[300px] 1xl:w-[300px] xmd:w-[300px] xmd:h-[300px] sm:w-[200px] sm:h-[300px] xxsm:w-[300px] xxsm:h-[300px] rounded-full -mt-5 2xl:-ml-20 1xl:-ml-20 sm:ml-2 xxsm:-ml-7">
            </div>
            <div class="flex sm:flex-wrap msm:flex-wrap xsm:flex-wrap xxsm:flex-wrap justify-between pt-20 mx-5 z-10">
                <div class="">
                    <p
                        class="font-poppins font-semibold md:text-5xl xxsm:text-2xl xsm:text-2xl sm:text-2xl leading-1 " style="color:white;">
                        {{ __('Feature Categories') }}</p>
                </div>
                <div class=" xxsm:max-sm:hidden">
                    <a type="button" href="{{ url('/all-category') }}"
                        class="px-10 py-3 border border-blue text-center font-poppins font-normal text-base leading-6 rounded-md flex" style="color:white;">{{ __('See all') }}
                        <img src="{{ url('images/right-success.png') }}" alt=""
                            class="w-3 h-3 mt-1.5 ml-2"></a>
                </div>
            </div>
            @if (count($category) == 0)
                <div class="font-poppins font-medium text-lg leading-4 text-black mt-5 ml-5 capitalize">
                    {{ __('There are no category added yet') }}
                </div>
            @endif
            <div
                class="grid gap-x-7 3xl:grid-cols-4 xl:grid-cols-4 xlg:grid-cols-2 xxmd:grid-cols-2 xxmd:gap-y-7 sm:grid-cols-1 sm:gap-y-7 msm:grid-cols-1 xxsm:grid-cols-1 msm:gapy-7 xxsm:gap-y-7 justify-between pt-10 z-10 relative">
                @foreach ($category as $item)
                    <div
                        class="shadow-lg bg-white p-5 rounded-lg hover:scale-110 transition-all duration-500 cursor-pointer">
                        <a href="{{ url('events-category/' . $item->id) . '/' . Str::slug($item->name) }}">
                            <img src="{{ url('images/upload/' . $item->image) }}" alt=""
                                class="rounded-lg w-full h-40 bg-cover object-cover">
                            <a href="{{ url('events-category/' . $item->id) . '/' . Str::slug($item->name) }}">
                                <p class="font-popping font-semibold text-xl leading-8 text-center pt-3"  style="color:#ffffff;">
                                    {{ $item->name }}
                                </p>
                            </a>
                        </a>
                    </div>
                    @if ($loop->iteration == 4)
                    @break
                @endif
            @endforeach
            <div class="sm:hidden">
                <a type="button" href="{{ url('/all-category') }}"
                    class="px-10 py-3 text-blue border border-blue text-center font-poppins font-normal text-base leading-6 rounded-md flex">{{ __('See all') }}
                    <img src="{{ url('images/right-success.png') }}" alt=""
                        class="w-3 h-3 mt-1.5 ml-2"></a>
            </div>
        </div>

        {{-- Latest blogs --}}
        <div
            class="absolute bg-warning blur-3xl opacity-10 s:bg-opacity-10 3xl:w-[370px] 3xl:h-[370px] 2xl:w-[300px] 2xl:h-[300px] 1xl:w-[300px] xmd:w-[300px] xmd:h-[300px] sm:w-[200px] sm:h-[300px] xxsm:w-[300px] xxsm:h-[300px] rounded-full -mt-5 2xl:-ml-20 1xl:-ml-20 sm:ml-2 xxsm:-ml-7">
        </div>
        <div class="flex sm:flex-wrap msm:flex-wrap xsm:flex-wrap xxsm:flex-wrap justify-between pt-20 mx-5 z-0">
            <div>
                <p
                    class="font-poppins font-semibold md:text-5xl xxsm:text-2xl xsm:text-2xl sm:text-2xl text-warning leading-10">
                    {{ __('Latest Blogs') }}</p>
            </div>
            <div class=" xxsm:max-sm:hidden">
                <a type="button" href="{{ url('/all-blogs') }}"
                    class="px-10 py-3 text-warning border border-warning text-center font-poppins font-normal text-base leading-6 rounded-md flex">{{ __('See all') }}
                    <img src="{{ url('images/right-warning.png') }}" alt=""
                        class="w-3 h-3 mt-1.5 ml-2"></a>
            </div>
        </div>
        @if (count($blog) == 0)
            <div class="font-poppins font-medium text-lg leading-4 text-black mt-5 ml-5 capitalize">
                {{ __('There are no blog added yet') }}
            </div>
        @endif
        <div class="grid xl:grid-cols-2 gap-5 lg:grid-cols-1 xxsm:grid-cols-1 pb-5">
            @foreach ($blog as $item)
                <div
                    class="flex 3xl:flex-row 2xl:flex-nowrap 1xl:flex-nowrap xl:flex-nowrap xlg:flex-wrap flex-wrap justify-between 3xl:pt-5 xl:pt-5 gap-x-5 xl:w-full xlg:w-full">
                    <div
                        class="w-full shadow-lg p-5 rounded-lg flex 3xl:flex-nowrap md:flex-nowrap sm:flex-wrap msm:flex-wrap xsm:flex-wrap xxsm:flex-wrap bg-white xlg:w-full xmd:w-full 3xl:mb-0 xl:mb-0 xlg:mb-5 xxsm:mb-5">
                        <div
                            class="relative 3xl:w-[60%] xl:w-[60%] xlg:w-[30%] xmd:w-[60%] xxmd:w-[20%]  sm:w-1/2">
                            <img src="{{ asset('images/upload/' . $item->image) }}" alt=""
                                class="rounded-lg h-56 w-full ">
                            @if (Auth::guard('appuser')->user())
                                <div
                                    class="shadow-lg rounded-lg w-10 h-10 text-center absolute bg-white top-3 left-3">
                                    @if (Str::contains($user->favorite_blog, $item->id))
                                        <a href="javascript:void(0);" class="like"
                                            onclick="addFavorite('{{ $item->id }}','{{ 'blog' }}')"><img
                                                src="{{ url('images/heart-fill.svg') }}" alt=""
                                                class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                    @else
                                        <a href="javascript:void(0);" class="like"
                                            onclick="addFavorite('{{ $item->id }}','{{ 'blog' }}')"><img
                                                src="{{ url('images/heart.svg') }}" alt=""
                                                class="object-cover bg-cover fillLike bg-white-light p-2 rounded-lg"></a>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="ml-4 3xl:w-full xl:w-full xlg:w-full xmd:w-full xxmd:w-[80%] sm:w-1/2">
                            <div class="flex justify-between">
                                <button
                                    class="px-3 py-1 xxsm:max-md:mt-5 text-success bg-success-light rounded-full"  style="color:#ffffff;">{{ $item->category->name }}</button>
                                <p class="font-poppins font-medium text-base  leading-6 text-gray"  style="color:#ffffff;">
                                    {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }} </p>
                            </div>
                            <p class="font-popping font-bold capitalize text-xl  leading-8 text-left pt-3">
                                {{ $item->title }}</p>
                            <p class="font-popping font-normal text-base !leading-7 text-gray text-left"  style="color:#ffffff;">
                                {!! \Illuminate\Support\Str::limit($item->description, 150, $end = '...') !!}
                            </p>
                            <a type="button"
                                href="{{ url('/blog-detail/' . $item->id . '/' . str::slug($item->title)) }}"
                                class="mt-5 text-primary font-poppins font-medium text-base leading-7 flex pt-1 justify-end">{{ __('Read More') }}
                                <img src="{{ asset('images/right-purpal.png') }}" alt=""
                                    class="w-3 h-3 mt-1.5 ml-2"></a>
                        </div>
                    </div>
                </div>
                @if ($loop->iteration == 4)
                @break
            @endif
        @endforeach
        <div class="sm:hidden">
            <a type="button" href="{{ url('/all-blogs') }}"
                class="px-10 py-3 text-warning border border-warning text-center font-poppins font-normal text-base leading-6 rounded-md flex">{{ __('See all') }}
                <img src="{{ url('images/right-warning.png') }}" alt=""
                    class="w-3 h-3 mt-1.5 ml-2"></a>
        </div>
    </div>
</div>


<!-- Modal Structure -->
<div id="eventModal" class="modal">
  <div class="modal-content" style="height:590px; overflow-y:scroll;">
    <span class="close-btn"  onclick="closeModal()">&times;</span>
    <h1 style="font-size: 23px; color: #333; cursor: pointer;">
    <a href="" id="eventTitle" style="text-decoration: none; color: inherit;">Event Title</a>
</h1>
    <img id="eventImage" src="" alt="Event Image" class="event-img" style="height:320px; width:300px;"/>
    <p><strong>Description:</strong> <span id="eventDescription"></span></p>
    <p><strong>Date:</strong> <span id="eventDate"></span></p>
    <p><strong>Venue:</strong> <span id="eventVenue"></span></p>
    <p><strong>Price:</strong> $<span id="eventPrice"></span></p>
  </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var isSmallScreen = window.innerWidth <= 640;

    var calendar = new FullCalendar.Calendar(calendarEl, {
        events: function(info, successCallback, failureCallback) {
            $.ajax({
                url: '{{ route('events.get') }}',  // Make sure the correct route is used
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    successCallback(data);  // Pass the event data to FullCalendar
                },
                error: function(xhr, status, error) {
                    failureCallback(error);  // Handle any errors
                }
            });
        },

        // New hook in FullCalendar v6 to set event colors
        eventDidMount: function(info) {
            var event = info.event;
            var category = event.extendedProps.category;  // Get category from event data

            // Default event color
            var color = 'orange';

            // Set event color based on category
            if (category === 'Game Night') {
                color = 'blue';  
            } else if (category === 'Amapiano') {
                color = 'grey';  
            }
            else if(category === 'Pop & Culture'){
                color = 'green';
            }

            // Set the color property of the event
            info.el.style.backgroundColor = color;
            info.el.style.borderColor = color;
        },

        eventClick: function(info) {
            // Show event details in a simple alert
            // alert("Event: " + info.event.title + "\nDescription: " + info.event.extendedProps.description);
             // Get event details
             var event = info.event;
             var eventId = event.id;
            var eventTitle = event.title;
            var eventImage = event.extendedProps.image;  // Assuming the image is part of the event data
            var eventDescription = event.extendedProps.description;
            var eventDate = event.start.toLocaleString(); // Convert to a readable date
            var eventVenue = event.extendedProps.venue;
            var eventPrice = event.extendedProps.price;
            
            var eventSlug = eventTitle ? eventTitle.replace(/\s+/g, '-').toLowerCase() : '';  // Simple slug creation by replacing spaces with hyphens

            // Construct the URL for the blog detail page
            var eventUrl = '{{ url("/event/") }}/' + eventId + '/' + eventSlug;
            
            // Populate modal with event details
            document.getElementById('eventTitle').textContent = eventTitle;
            document.getElementById('eventImage').src = eventImage ? '{{ asset('images/upload/') }}' + '/' + eventImage : 'default-image.jpg';  // Use a default image if not available
            document.getElementById('eventDescription').textContent = eventDescription;
            document.getElementById('eventDate').textContent = eventDate;
            document.getElementById('eventVenue').textContent = eventVenue;
            document.getElementById('eventPrice').textContent = eventPrice;
            document.getElementById('eventTitle').setAttribute('href', eventUrl);

            // Open the modal
            var modal = document.getElementById('eventModal');
            modal.style.display = 'block';
        },

        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: isSmallScreen ? 'timeGridDay' : 'dayGridMonth,timeGridWeek,timeGridDay',
        },
        windowResize: true, // Ensure FullCalendar resizes dynamically on window change
       // aspectRatio: 1.5,   // Optionally adjust aspect ratio
        //height: 'auto',     // Let the calendar height adjust dynamically
        //width: isSmallScreen? '100%': 'auto',
        aspectRatio: isSmallScreen ? 1 : 1.5,  // Adjust aspect ratio for small screens
        height: isSmallScreen ? '100vh' : 'auto',  // Full screen height on small screens
        width: isSmallScreen ? '100%' : 'auto',   // Full width on small screens
    });

    calendar.render();
});


function closeModal() {
    var modal = document.getElementById('eventModal');
    modal.style.display = 'none';  // Close the modal
}

</script>
</div>
<style>
    /* Modal styles */
.modal {
  display: none;  /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 9999;   /* Ensure modal is on top of all content */
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;  /* Enable scroll if needed */
  background-color: rgba(0, 0, 0, 0.4);  /* Black with opacity for background */
  display: none;   /* Hidden by default, shown on trigger */
}

.modal-content {
  background-color: #fefefe;
  margin: 5% auto; /* Center the modal with a smaller top margin */
  padding: 20px;
  border: 1px solid #888;
  width: 70%; /* Width can be adjusted for responsiveness */
  max-width: 900px; /* Optional: Maximum width */
  box-sizing: border-box;
  border-radius: 10px;  /* Optional: Add rounded corners */
}

.close-btn {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}

.close-btn:hover,
.close-btn:focus {
  color: black;
  text-decoration: none;
}

.event-img {
  width: 100%; /* Make the image fit the container */
  height: auto;
  border-radius: 8px; /* Optional: Add rounded corners to the image */
}

</style>
@endsection
