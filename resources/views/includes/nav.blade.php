<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{$data['_Flight']}}"  href="{{url('')}}">Flight</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$data['_Hotel']}}" href="{{url('hotel')}}">Stays</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$data['_Packages']}}" href="{{url('packages')}}">Attractions</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$data['_Visa']}}" href="{{url('visa')}}">Visa</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$data['_Insurance']}}" href="{{url('insurance')}}">Insurance</a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link {{$data['_Car']}}" href="{{url('car-rentals')}}">Car Rentals</a>
    </li>
</ul>