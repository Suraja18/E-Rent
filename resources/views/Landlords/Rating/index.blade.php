<x-users.main.app-layout>
    <x-slot name="head">
        - Rating
    </x-slot>
    <x-admin.sidebar />

    <x-admin.navbar />

    <x-admin.banners>
        <x-slot name="name">Rating</x-slot>
    </x-admin.banners>
                           
    <x-landlords.responsive-table>
        <x-slot name="heading">Rating</x-slot>
        <x-slot name="thead">
            <tr>
                <th>S.N</th>
                <th>User Name</th>
                <th>Rating</th>
                <th>Review</th>
                <th>Action</th>
            </tr> 
        </x-slot>
        <x-slot name="tbody">
            @foreach ($rates as $rate)
                <tr>
                    <td>{!! $loop->iteration !!}</td>
                    <td data-name="User Name">{!! $rate->rentProperty->building->name !!} @if(isset($rate->rentProperty->rent_name)) / {!! $rate->rentProperty->rent_name !!} @endif</td>
                    <td data-name="Rating">
                        @php
                            $ratingStar = $rate->rate; 
                            $fullStars = floor($ratingStar);
                            $halfStar = fmod(floatval($ratingStar), 1.0) >= 0.5;
                        @endphp
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $fullStars)
                                <svg class="svg-inline-fa text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3z"></path></svg>
                            @elseif ($i == $fullStars + 1 && $halfStar)
                                <svg class="svg-inline-fa text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star-half-stroke" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M463.1 474.7C465.1 486.7 460.2 498.9 450.2 506C440.3 513.1 427.2 514 416.5 508.3L288.1 439.8L159.8 508.3C149 514 135.9 513.1 126 506C116.1 498.9 111.1 486.7 113.2 474.7L137.8 328.1L33.58 225.9C24.97 217.3 21.91 204.7 25.69 193.1C29.46 181.6 39.43 173.2 51.42 171.5L195 150.3L259.4 17.97C264.7 6.954 275.9-.0391 288.1-.0391C300.4-.0391 311.6 6.954 316.9 17.97L381.2 150.3L524.9 171.5C536.8 173.2 546.8 181.6 550.6 193.1C554.4 204.7 551.3 217.3 542.7 225.9L438.5 328.1L463.1 474.7zM288 376.4L288.1 376.3L399.7 435.9L378.4 309.6L469.2 219.8L343.8 201.4L288.1 86.85L288 87.14V376.4z"></path></svg>
                            @endif
                        @endfor
                    </td>
                    <td data-name="Review">
                        @if(strlen($rate->review) > 150)
                            {!! substr($rate->review, 0, 150) !!}...
                        @else
                            {!! $rate->review !!}
                        @endif
                    </td>
                    <td class="table-action-cell">
                        <form action="{{ route('admin.rating.destroy', $rate) }}" method="POST" class="table-btns danger" id="deleteTables{!! $rate->id !!}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="none" onclick="return confirmDelete('deleteTables{!! $rate->id !!}')">
                                <span class="action-icons">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                </span>
                                <span class="action-names">Delete</span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

            
        </x-slot>
    </x-landlords.responsive-table>


    <x-landlords.footer />                
</x-users.main.app-layout>