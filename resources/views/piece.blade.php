<x-layout>
    <!-- Slot for Header -->
    <x-slot name="nav">
        <x-user-nav />
    </x-slot>

    <section class="piece">

        <div class="piece__preview">
            <h1 class="piece__title">{{ $category->name }}</h1>

            <div class="piece__description">{{ $category->description }}
            </div>
        </div>


        <div class="piece__grid" x-data="carouselData({{ $category->images->pluck('image_path') }})">

            @foreach ($category->images as $image)
                <div class="piece__item">
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="lorem"
                        @click="showImage('{{ asset('storage/' . $image->image_path) }}', {{ $loop->index }})">
                </div>
            @endforeach

            <div class="piece__overlay" x-show="showOverlay" @click.self="closeOverlay" style="display: none;"
                x-transition>

                <button class="piece__btn piece__btn--prev" @click="prevImage">
                    <svg width="10" height="18" viewBox="0 0 10 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 1L1 9L9 17" stroke="#33323D" />
                    </svg>
                </button>

                <img :src="imgSrc" alt="Image" class="piece__img">

                <button class="piece__btn piece__btn--next" @click="nextImage">
                    <svg width="10" height="18" viewBox="0 0 10 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L9 9L1 17" stroke="#33323D" />
                    </svg>
                </button>
            </div>
        </div>

        <script>
            function carouselData(images) {
                return {
                    showOverlay: false,
                    imgSrc: '',
                    currentIndex: 0,
                    images: images,

                    showImage(src, index) {
                        this.imgSrc = src;
                        this.currentIndex = index;
                        this.showOverlay = true;
                    },

                    closeOverlay() {
                        this.showOverlay = false;
                    },

                    prevImage() {
                        if (this.currentIndex > 0) {
                            this.currentIndex--;
                        } else {
                            this.currentIndex = this.images.length - 1;
                        }
                        this.imgSrc = '/storage/' + this.images[this.currentIndex];
                    },

                    nextImage() {
                        if (this.currentIndex < this.images.length - 1) {
                            this.currentIndex++;
                        } else {
                            this.currentIndex = 0;
                        }
                        this.imgSrc = '/storage/' + this.images[this.currentIndex];
                    }
                }
            }
        </script>

    </section>

    <x-slot name="footer">
        <x-footer />
    </x-slot>

</x-layout>
