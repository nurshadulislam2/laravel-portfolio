<section class="page-section" id="contact">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Me</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Contact Section Form-->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">

                @if(Session::has('suc'))
                <p class="small text-success">{{ Session::get('suc') }}</p>
                @endif

                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <!-- Name input-->
                    <div class="form-floating mb-3">
                        <input
                            class="form-control @error('name')
                            is-invalid
                        @enderror"
                            name="name" id="name" type="text" placeholder="Enter your name..." />
                        <label for="name">Full name</label>
                        @error('name')
                            <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input
                            class="form-control @error('email')
                            is-invalid
                        @enderror"
                            name="email" id="email" type="email" placeholder="name@example.com" />
                        <label for="email">Email address</label>
                        @error('email')
                            <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Message input-->
                    <div class="form-floating mb-3">
                        <textarea
                            class="form-control @error('message')
                            is-invalid
                        @enderror"
                            name="message" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem"></textarea>
                        <label for="message">Message</label>
                        @error('message')
                            <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button-->
                    <button class="btn btn-primary btn-xl" type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
</section>
