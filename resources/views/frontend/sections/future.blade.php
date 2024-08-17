<section class="service-area section-padding-top" id="about-page">
    <div class="container">
     <div class="row">
             <div class="col-lg-6 offset-lg-3 text-center">
                 <div class="section-title">
                     <h3 class="title">{{ $bucketlistTitle->title }}</h3>
                     <div class="desc">
                         <p>{{ $bucketlistTitle->sub_title }}</p>
                     </div>
                 </div>
             </div>
         </div>

         <div class="row">
             @foreach ($bucketListGrowth as $bucket)
                 <div class="col-lg-4 {{ $loop->index > 2 ? 'mt-4' : '' }}">
                     <div class="single-service" >
                         <h3 class="title wow fadeInRight" data-wow-delay="0.3s">{{ $bucket->name }}</h3>
                         <div class="desc wow fadeInRight" data-wow-delay="0.4s">
                             <p>{{ $bucket->description }}</p>
                        <p class="poetic-description">Start by: {{ $bucket->startDate }}</p>

                         </div>

                         {{-- <h5 class="title wow fadeInRight" data-wow-delay="0.3s">Due Date: {{ $personal->dueDate }}</h5> --}}
                         
                     </div>
                 </div>
             @endforeach
         </div>
        
    </div>
</section>
