 <section class="service-area section-padding-top" id="about-page">
     <div class="container">
         <div class="row">
             <div class="col-lg-6 offset-lg-3 text-center">
                 <div class="section-title">
                     <h3 class="title">{{ $personalTitle->title }}</h3>
                     <div class="desc">
                         <p>{{ $personalTitle->sub_title }}</p>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row">
             @foreach ($personalGrowth as $personal)
                 <div class="col-lg-4 {{ $loop->index > 2 ? 'mt-4' : '' }}">
                     <div class="single-service" data-target-date="{{ $personal->dueDate }}">
                         <h3 class="title wow fadeInRight" data-wow-delay="0.3s">{{ $personal->name }}</h3>
                         <div class="desc wow fadeInRight" data-wow-delay="0.4s">
                             <p>{{ $personal->description }}</p>
                         </div>
                         {{-- <h5 class="title wow fadeInRight" data-wow-delay="0.3s">Start Date: {{ $personal->startDate }}
                         </h5>
                         <h5 class="title wow fadeInRight" data-wow-delay="0.3s">Due Date: {{ $personal->dueDate }}</h5> --}}
                         <div class="countdown-timer">
                             <div class="countdown-unit">
                                 <span class="number" id="days-{{ $loop->index }}"></span>
                                 <span class="label">Days</span>
                             </div>
                             <div class="countdown-unit">
                                 <span class="number" id="hours-{{ $loop->index }}"></span>
                                 <span class="label">Hours</span>
                             </div>
                             <div class="countdown-unit">
                                 <span class="number" id="minutes-{{ $loop->index }}"></span>
                                 <span class="label">Minutes</span>
                             </div>
                             <div class="countdown-unit">
                                 <span class="number" id="seconds-{{ $loop->index }}"></span>
                                 <span class="label">Seconds</span>
                             </div>
                         </div>
                     </div>
                 </div>
             @endforeach
         </div>
     </div>
 </section>
