<div class="row" id="load-animal">
    @foreach ($animals as $animal)
        <div class="col-md-6 col-xl-4 col-sm-12 col-12 mb-3">
            <div class="animal flipInX animated">
                <div class="{{ $animal->species }} animal-block">
                    <div class="crop">
                        <img src="{{asset("storage/$animal->main_foto")}}" alt="Фото животного">
                    </div>
                    <p class="title"></p>
                    <a href="{{route('pets.show', $animal->id)}}"
                       data-group="paws_1"><span>{{ $animal->name }}</span></a>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="row justify-content-center">
    {{ $animals->links() }}
</div>
