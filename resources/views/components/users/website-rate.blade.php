@php
    $rates = App\Models\WebRates::take(3)->get();
@endphp
<!-- Website Results -->
<section class="websiteResult">
    <div class="container p5">
        <div class="result-row">
            <div class="result-content-left">
                <h2 class="result-title">Private homes with Amenities</h2>
                <span class="result-paragraph">We promise private,
                    professionally-cleaned vacation rentals with 24/7
                    guest support so you can rent without worry.
                </span>
            </div>
            <div class="result-content-right">
                @foreach($rates as $index => $rate)
                    <div class="result-list-content">
                        <div class="differenceIconContent" 
                             style="background-color: {{ $index == 1 ? 'rgba(26,178,197,.15)' : ($index == 2 ? 'rgba(192,210,15,.15)' : '') }};">
                            <img alt="Icon for {{ $rate->title }}"
                                 src="{{ asset($rate->images) }}" 
                                 class="result-icons">
                        </div>
                        <div class="differenceContent">
                            <h2 class="differenceLabel">
                                {{ $rate->title }}
                            </h2>
                            <span class="differenceResult">
                                <p class="differenceDescription">{{ $rate->paragraph }}</p>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </div>
</section>
<!-- End Website Results -->