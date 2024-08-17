<section class="service-area section-padding-top" id="about-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="section-title">
                    <h3 class="title">{{ $workingOnTitle->title }}</h3>
                    <div class="desc">
                        <p>{{ $workingOnTitle->sub_title }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($workingsGrowth as $work)
                <div class="col-lg-4 {{ $loop->index > 2 ? 'mt-4' : '' }}">
                    <div class="single-service"data-target-date="{{ $work->dueDate }}">
                        <h3 class="title wow fadeInRight" data-wow-delay="0.3s">{{ $work->name }}</h3>
                        <div class="desc wow fadeInRight" data-wow-delay="0.4s">
                            <p>{{ $work->description }}</p>
                            <p class="poetic-description">Due by: {{ $work->dueDate }}</p>
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
                </div>
            @endforeach
        </div>
    </div>
</section>
