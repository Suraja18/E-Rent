@php
    if(Auth::id())
    {
        $user = App\Models\User::find(Auth::id());
        if($user->roles == 1)
        {
            $manuals = App\Models\UserManual::where('role_id', '1')->orWhere('role_id', '3')->get();
        }elseif ($user->roles == 2) {
            $manuals = App\Models\UserManual::where('role_id', '2')->orWhere('role_id', '3')->get();
        }
    }else{
        $manuals = App\Models\UserManual::whereNull('role_id')->get();
    }
@endphp
@foreach ($manuals as $manual)
<section class="advertising"> 
    <div class="container ad-container pt-7b">
        <div class="banner pt-2">
            <div class="hero-banner for-mobiles">
                <div class="col-50 hero-left hero w-40">
                    <div class="hero-container pr-5t">
                        <div class="hero-content hero">
                            <div class="hero-header">
                                <h1 class="hero-header-text">{!! $manual->title !!}</h1>
                            </div>
                            <p class="paragraph">{!! $manual->description !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-50 hero-right hero w-60">
                    <div class="hero-image-container lightblueColor">
                        <div class="hero-banner-image">
                            <div class="image-container">
                                <iframe width="100%" height="480px"
                                    src="{!! $manual->link !!}"
                                    frameborder="0" allowfullscreen
                                    allow="autoplay; encrypted-media"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
