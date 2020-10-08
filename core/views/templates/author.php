<?php $author = $data['author'];
?>
<main class="bg-white">
    <div class="main__inner">
        <div class="under__line d-block mt-2 mt-lg-5 mb-2 mb-lg-4 pt-3 mx-4">
            <h1 class="author__name ml-1 ml-lg-3 font-italic">Author</h1>
        </div>
        <div class="row author__inner pt-4 mb-3 mb-lg-5">
            <div class="col-3">
                <a data-fancybox="gallery" href="/assets/img/author-avatar.png" class="" style="cursor: zoom-in;">
                    <img src="/assets/img/author-avatar.png" alt="Аватар" class="ml-3 ml-lg-5 w-75"
                        style="border-radius: 50%;">
                </a>
            </div>
            <div class="col-9">
                <h2 class="font-weight-bold"><?=$author['login'];?></h2>
                <p class="mt-1 mt-lg-3">United States</p>
                <div class="social__list">
                    <ul class="social__links social__links__author list-unstyled d-flex justify-content-start">
                        <li><a target="_blank" href="https://www.google.com"><i class="fa fa-google-plus mr-3"
                                    aria-hidden="true"></i></a></li>
                        <li><a target="_blank" href="https://twitter.com/home"><i class="fa fa-twitter mr-3"
                                    aria-hidden="true"></i></a></li>
                        <li><a target="_blank" href="https://facebook.com"><i class="fa fa-facebook mr-3"
                                    aria-hidden="true"></i></a></li>
                        <li><a target="_blank" href="https://pinterest.com"><i class="fa fa-pinterest"
                                    aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <h3 class="my-3 my-lg-5 font-italic">About Lemon</h3>
                <article class="pl-0 col-10 font-weight-light font-italic" style="line-height: 2S;">
                    Over the fifteen-year life span of Food.com, we’ve learned that – in addition to eating – sharing is
                    what you do best. And thanks to the 20 million of you who come here each month, we now have 500,000
                    recipes to show for it, more than anywhere else in the digital universe. We also have tons
                    crazy-tempting photos, troves of recipe reviews and more than 2 million Facebook likes. That’s a
                    heck of a lot of Food. Thank you!
                </article>
                <div class="signature d-flex justify-content-end col-10 pl-0 mb-3 mb-lg-5 mt-2 mt-lg-4">
                    <img src="/assets/img/Signature.png" alt="Signature" class="">
                </div>
            </div>
        </div>

</main>