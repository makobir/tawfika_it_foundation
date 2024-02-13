<section class="sptb">
   <div class="container customerpage">
      <div class="row">
         <div class="single-page">
            <div style="display: block; margin-left: 37%;" class="col-lg-6 col-xl-4 col-xl-offset-3 col-md-6">
               <div class="wrapper wrapper2">
                  <form class="card-body" tabindex="500" method="post" action="<?= base_url()?>authenticator/user_login_check">
                     <h3>Login</h3>
                     <div class="mail"> <input style="color: #000" type="text" name="username"> <label>Username</label> </div>
                     <div class="passwd"> <input style="color: #000" type="password" name="password"> <label>Password</label> </div>
                     <div class="submit"> <button type="submit" class="btn btn-primary btn-block">Login</button> </div>
                     <p class="mb-2"><a href="#">Forgot Password</a></p>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>