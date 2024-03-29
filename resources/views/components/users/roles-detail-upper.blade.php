<section class="container-large pt-7b no-pt">
    @if ($indexPage)
        {{ $indexPage }}
    @endif
    <div class="hero-banner reverse">
            <div class="col-50 hero-left">
                    <div class="hero-container pr-5t">
                            <div class="hero-content mb-3 pt-7b no-pb">
                            {{-- @if ($detailPage)
                                {{ $detailPage }}
                                <h1>Elevating people and property conditions</h1> 
                            @endif --}}
                            <h2 class="heading-med is--text-orange70">Managers</h2>
                            <p>Effectively managing property maintenance and onsite teams requires the right tools. That’s why we offer a complete suite of apps to simplify processes, drive better performance, and generate a comprehensive view of every unit in your portfolio. While your team’s running smoothly, you can take a step back with data-driven reports that help you see the big picture — driving higher occupancy, frictionless operations, and creating communities your residents love to call home.<br></p>
                            </div>
                    </div>
                    </div>
                    <div class="col-50">
                    <div class="roles-user-banners wow bounceInDown">
                            <img src="https://assets-global.website-files.com/6414ce4dcbfbc386d105ceb9/6414ce4dcbfbc3395a05d1e4_ManagerHeader.jpg" sizes="(max-width: 479px) 90vw, (max-width: 767px) 92vw, (max-width: 991px) 90vw, (max-width: 1279px) 45vw, (max-width: 1919px) 44vw, 848px" alt="ROles Image" loading="eager" class="role-banner-image">
                    </div>
            </div>
    </div>
    @if ($indexPageBtn)
        {{ $indexPageBtn }}
    @endif
</section>