
<div>
    @foreach($circles as $circle)
    <div id="circle_item" class="bg-white search-shadow pt-3 mb-2">
        <div class="container col-md-8 col-lg-6">
            <div>
                <a href="{{ route('circle.show', [ $circle->id ]) }}" class="hov--default">
                    <div class="row">
                        <div class="col-8">
                            <h6 class="text-fw-bold mb-2 line-1 text-fz-14px false hov--default">
                                <span class="badge badge-light text-fw-normal">サークル</span>
                                {{ $circle->name }}
                            </h6>
                            <div class="scrollable-list">
                            @foreach($circle->genres as $genre)
                                <p class="btn btn-outline-success btn-sm btn-sm--expand mr-2 
                                d-inline-block text-tz-xs">{{ $genre->name }}</p>
                            @endforeach
                            </div>
                            <div class="row no-gutters">
                                <i class="fas fa-map-marker-alt mr-2 d-flex" style="font-size: 0.8em; color: mediumorchid;"><p class="ml-2 text-fz-small" style="font-weight:400; color:black;">{{ $circle->prefecture->name }}</p></i>
                                <i class="fas fa-user-friends mr-3 d-flex" style="font-size: 0.8em; color: mediumorchid;"><p class="ml-2 text-fz-small" style="font-weight:400; color:black;">{{ $circle->count }}</p></i>
                            </div>
                            <p class="text-black-50 line-2 mb-2_5 text-fz-14px">
                                {{ $circle->introduction }}
                            </p>
                        </div>
                        <div class="col-4 pl-0 mb-3">
                            <div class="adjust-box adjust-box-4x3" style="width:100%;">
                            @if($circle->image)
                                <img src="/storage/CircleImages/{{ $circle->image }}" class="rounded w-100 object-fit-cover adjust-box-inner">
                            @else
                                <img src="/storage/UserImages/no_image.jpeg" class="rounded w-100 object-fit-cover adjust-box-inner">
                            @endif
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
