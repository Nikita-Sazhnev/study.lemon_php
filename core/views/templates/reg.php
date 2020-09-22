<?php

?>
<div class="singin__form col-9 col-md-5 col-sm-7 col-lg-3 my-4 col-3 bg-white py-3 px-4 shadow__box mx-auto">
    <h6 class="underline font-italic">Sing in</h6>
    <p class="mt-3 font-weight-light">Sing in for LEMON</p>
    <form method="POST">
        <div class="form-group">
            <input type="email" class="form-control form__input btn-outline-light" id="exampleInputEmail"
                aria-describedby="emailHelp" placeholder="emailn">
        </div>
        <div class="form-group">
            <input type="text" class="form-control form__input btn-outline-light" id="exampleInputEmail1"
                aria-describedby="emailHelp" placeholder="username">
        </div>
        <div class="form-group">
            <input type="password" class="form-control form__input btn-outline-light" id="exampleInputPassword1"
                placeholder="password">
        </div>
        <div class="form-group">
            <input type="password" class="form-control form__input btn-outline-light" id="exampleInputPassword2"
                placeholder="repeat password">
        </div>
        <div class="button__contein d-flex justify-content-center">
            <button type="submit" class="btn btn-sm btn-outline-dark px-4 pt-2 pb-1 my-1 text-uppercase"
                style="border-radius: 0; border-color: lightgray; font-size: .9rem;">Sign In</button>
        </div>
        <div class="social__reg d-flex justify-content-center my-3">
            <a href="#"><i class="reg__fb fa fa-facebook mr-3" aria-hidden="true"></i></a>
            <a href="#"><i class="reg__gp fa fa-google-plus" aria-hidden="true"></i></a>
        </div>
        <div class="terms__politics">
            <p class="m-0 text-black-50"> By joining LEMON, you agree for our</p>
            <a class="d-block" style="text-decoration: underline;color: blue;" href="#">Term of
                Service</a>
            <a class="d-block text-uppercase mt-2" href="#">Login</a>
        </div>
    </form>
</div>