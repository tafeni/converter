<section class="contact-area" id="contact">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-5 col-lg-6 story">
                <div class="">
                    <div class="section-title text-left">
                        <h3 class="sub-title text-white">How it started?</h3>
                        <h2 class="title">Our Story.</h2>
                    </div>
                </div>
                <section>
                    <p class="text-white justify" style="text-align: justify">
                        It all started in the Lord's house. I had stopped over on a Sunday morning to meet up with a friend at his church.  While he stepped out of church to chat with me, he couldn't concentrate on our conversation as he was trying to convert a game code his friend (who won 320k the previous weekend) gave him.

                        His friend plays on 1xbet and he plays on Sportybet.  He complained about always missing out on his friend's games who apparently wins many times.

                        While I consider myself more a lottery player than a punter (how else do you explain always trying to win 3 million with 100 naira....lol), I was subtly aware the sports betting industry was huge.  So the entrepreneur in me kicked in and decided to solve this problem.

                        The days have been long, the team much larger, the brains smarter, the drive more engaged, the passion more "gingered" and the product a whole lot better than the manual conversion process we started with all in a bid to make life easy for YOU. So you never have to miss out on a code regardless of your preferred bookmaker.

                        That's our story. Tell us yours and how you got into sports betting. Also tell us if you want us to share your story.
                    </p>
                </section>
            </div>
            <div class="col-lg-6">
                <div class="contact-form-area">
                    <div class="section-title text-left">
                        <h3 class="sub-title">Do you have a question?</h3>
                        <h2 class="title">Stay In Touch With Us </h2>
                    </div>
                    <div class="contact-form-wrapper">
                        <div id="check">

                        </div>
                        <form action="{{route('post.contact.page')}}" method="POST" id="contactfrm">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name" name="name" value="{{old('name')}}" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" placeholder="Email" name="email" value="{{old('email')}}" required>
                                </div>
                                <div class="loader" id="loader" style="display:none"></div>
                                <div class="col-lg-12">
                                    <textarea required name="message" id="message" cols="30" rows="7" placeholder="Message"></textarea>
                                    <input type="submit" class="bg-green" value="Send Message">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
