<section id="schedule" class="section-with-bg">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Event Schedule</h2>
        <p>Here is our schedule</p>
      </div>

      <ul class="nav nav-tabs" role="tablist" data-aos="fade-up" data-aos-delay="100">
          @foreach ($schedules as $key => $value)
          <li class="nav-item mt-2">
            <a class="nav-link @if($key == 1) active @endif" href="#day-{{$key}}" role="tab" data-bs-toggle="tab">Week {{$key}}</a>
          </li>
          @endforeach
      </ul>

      <h3 class="sub-heading">Voluptatem nulla veniam soluta et corrupti consequatur neque eveniet officia. Eius
        necessitatibus voluptatem quis labore perspiciatis quia.</h3>

      <div class="tab-content row justify-content-center" data-aos="fade-up" data-aos-delay="200">

        @foreach ($schedules as $key => $value)
        <!-- Schdule Week 1 -->
        <div role="tabpanel" class="col-lg-9 tab-pane fade show @if($key == 1) active @endif" id="day-{{$key}}">
            @foreach ($value as $day => $data)

            <div class="row schedule-item" style="align-items: space-between">
              <div class="col-md-2"><time>{{$day}}</time></div>
              <div class="col-md-10">
                @foreach ($data as $activity)
                <p>{{$activity}}.</p>
                @endforeach
              </div>
            </div>
            @endforeach
        </div>
        @endforeach
        </div>
    </div>
    </section>
