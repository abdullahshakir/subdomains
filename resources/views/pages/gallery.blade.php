<div class="section mb-0" data-spy="scroll" data-target="#navbar" data-offset="0">
    <div class="container">
        <h3 id="gallery">Gallery</h3>
        <div class="divider"><i class="icon-circle"></i></div>
        <div class="masonry-thumbs grid-container grid-6" data-big="3" data-lightbox="gallery">
            @forelse($gallery as $images)
            <a class="grid-item" href="{{ $images['file'] }}" data-lightbox="gallery-item">
                <img src="{{ $images['file'] }}"
                     alt="{{ $images['file'] }}"
                     width="100"
                >
            </a>
            @empty
                <p class="text-center">Not record found</p>
            @endforelse
        </div>
    </div>
</div>
