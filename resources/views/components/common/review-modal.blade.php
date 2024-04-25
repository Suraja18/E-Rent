@php
    $existingReview = App\Models\webReview::where('user_id', auth()->id())->first();
@endphp
@if(!$existingReview)
<section class="body-modal">
    <div id="reviewModal" class="modal">
        <div class="modal-content">
          <span id="closeReviewModal" class="close-button">×</span>
          <h2 class="mb-1">Customer Review</h2>
          <h4 class="mb-1">Rate our website</h2>
          <form id="inputReviewForm" class="input-review-form" method="POST" action="{!! route('website.review.tenant') !!}">
            @csrf
            <div class="row">
                <h5 class="text-left">Your rating</h5>
                <div id="rateStar" class="rate-star mb-1" style="width: 160px; height: 32px; background-size: 32px; cursor:pointer;" data-rating="0" title="5/5">
                    <div id="starValue" class="star-value" style="background-size: 32px; width: 0%"></div>
                </div>
                @error('rating')
                    <p class="error-message">{{ $message }}</p>
                @enderror
                <input type="hidden" name="rating" id="ratingInputReview" value="0">
                <div class="text-left mb-1" style="padding-left: 0">
                    <h5 class="mb-1">Your review</h5>
                    <textarea class="form-control table-datas" name="review" rows="5" placeholder="Write your review" required> </textarea>
                    @error('review')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
                <div class="text-center mb-1">
                    <button class="m-button submit-blue">
                        Submit
                    </button>
                </div>
            </div>
          </form>
        </div>
      </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var modal = document.getElementById('reviewModal');
        var closeButton = document.getElementById('closeReviewModal');
        var rateStarReview = document.getElementById('rateStar');
        var starValueReview = document.getElementById('starValue');
        var ratingInputReview = document.getElementById('ratingInputReview');

        function showModal() {
            modal.style.display = "block";
        }

        function hideModal() {
            modal.style.display = "none";
            setTimeout(showModal, 600000);
        }

        function setRating(widthPercent) {
            starValueReview.style.width = `${widthPercent}%`;
            var rating = (widthPercent / 20).toFixed(1); 
            ratingInputReview.value = rating;
        }

        rateStarReview.addEventListener('mousemove', function(e) {
            var boundingClientRect = rateStarReview.getBoundingClientRect();
            var widthPercent = ((e.clientX - boundingClientRect.left) / boundingClientRect.width) * 100;
            setRating(Math.round(widthPercent / 10) * 10);
        });

        rateStarReview.addEventListener('click', function(e) {
            var boundingClientRect = rateStarReview.getBoundingClientRect();
            var widthPercent = ((e.clientX - boundingClientRect.left) / boundingClientRect.width) * 100;
            setRating(Math.round(widthPercent / 10) * 10);
        });

        rateStarReview.addEventListener('mouseleave', function() {
            var currentRating = parseFloat(ratingInputReview.value) * 20;
            setRating(currentRating);
        });

        closeButton.onclick = function() {
            hideModal();
        };

        window.onclick = function(event) {
            if (event.target == modal) {
                hideModal();
            }
        }
        setTimeout(showModal, 600000);
    });
</script>
@endif