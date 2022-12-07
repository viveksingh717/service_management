<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Contact Us</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>/</li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="content-central">
        <div class="semiboxshadow text-center">
            <img src="{{asset('assets/img/img-theme/shp.png')}}" class="img-responsive" alt="img">
        </div>
        <div id="map" class="honmob"> </div>
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <aside>
                                <h4>The Office</h4>
                                <address>
                                    <strong>RuntimeTerror Home Services.</strong><br>
                                    <i class="fa fa-map-marker"></i><strong>Address: </strong>Mira Road, Mumbai,
                                    India<br>
                                    <i class="fa fa-phone"></i><strong>Phone: </strong> +91-9004069694
                                </address>
                                <address>
                                    <strong>Vivek Emails</strong><br>
                                    <i class="fa fa-envelope"></i><strong>Email:</strong><a
                                        href="mailto:contact@surfsidemedia.in"> vivek.singh57@ymail.com</a><br>
                                    <i class="fa fa-envelope"></i><strong>Email:</strong><a
                                        href="mailto:support@surfsidemedia.in"> imvivek0777@gmail.com</a>
                                </address>
                            </aside>
                            <hr class="tall">
                        </div>
                        <div class="col-md-8">
                            <h3>Contact Form</h3>
                            <p class="lead"></p>
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('message')}}
                                </div>
                            @endif
                            <form wire:submit.prevent="sendMail" id="contactform" class="form-theme" method="post">
                                @csrf

                                <input type="text" placeholder="Name" name="name" wire:model="name" required>
                                @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror

                                <input type="email" placeholder="Email" name="email" wire:model="email" required>
                                @error('email')
                                <p class="text-danger">{{$message}}</p>
                                @enderror

                                <input type="text" placeholder="Phone" name="phone" wire:model="phone" required>
                                @error('phone')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                               
                                <textarea placeholder="Your Message" name="msg" wire:model="msg"
                                    required rows="3"></textarea>

                                @error('msg')
                                <p class="text-danger">{{$message}}</p>
                                @enderror


                                <button type="submit" class="btn btn-primary" name="Submit">Send Message</button>

                            </form>
                            <div id="result"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-twitter content_resalt border-top">
            <i class="fa fa-twitter icon-big"></i>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 19.0760,
                    lng: 72.8777
                },
                zoom: 13
            });
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input);
        }
    </script>
    <script src="maps/api/js?key=AIzaSyDUivMJTPZn0DVMCnTmeOxPEAC6kSuplwU&libraries=places&callback=initAutocomplete"
        async="" defer=""></script>
</div>
