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
                             <p class="poetic-description">Start by: {{ $personal->startDate }}</p>
                             <p class="poetic-description">Due by: {{ $personal->dueDate }}</p>

                         </div>

                     </div>
                 </div>
             @endforeach
         </div>
     </div>
 </section>
