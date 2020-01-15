 <footer class="an-footer">
        <div class="container">
          <div class="an-footer-bottom">
            <div class="row">
              <div class="col-md-2 col-sm-6">
                <div class="an-widget">
                  <h4 class="an-small-title light-color">Menu</h4>
                  <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Category</a></li>
                    <li><a href="#">Listing</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-2 col-sm-6">
                <div class="an-widget">
                  <h4 class="an-small-title light-color">Support</h4>
                  <ul>
                    <li><a href="#">Prvecy Policy</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Terms &amp; Service</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact</a></li>
                  </ul>
                </div>
              </div>

              <div class="col-md-2 col-sm-6">
                <div class="an-widget">
                  <h4 class="an-small-title light-color">Manage</h4>
                  <ul>
                    <li><a href="#">Account</a></li>
                    <li><a href="#">Listing</a></li>
                    <li><a href="#">Register</a></li>
                    <li><a href="#">Subscription</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-2 col-sm-6">
                <div class="an-widget">
                  <h4 class="an-small-title light-color">Quick Links</h4>
                  <ul>
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">Agency Profile</a></li>
                    <li><a href="#">Activity</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-md-push-1 col-sm-6">
                <div class="an-widget newsletter">
                  <h4 class="an-small-title light-color">Subscribe to our news</h4>
                  <p>Contrary to popular belief, Lorem Ipsum is not simply random text.
                    It has roots in a piece of classical Latin.</p>
                  <form action="#" class="an-form">
                    <input type="email" class="an-form-control dark" placeholder="E-mail">
                    <button type="submit" class="an-btn an-btn-default btn-submit-full"><i class="ion-ios-paperplane"></i></button>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div> <!-- end container -->
        <div class="an-footer-copyright">
          <div class="container">
            <div class="content">
              <p class="copyrights">© 2017 Estate Property Listing by analoglife. All rights reserved</p>
              <ul class="an-social-icons">
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              </ul>

            </div>
          </div>
        </div>
      </footer> <!-- end an-footer -->
  <!-- Modal -->
  <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Registraion</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 clear-fix">
              <a href="{{route('register',['id'=>'seller'])}}" class="an-btn an-btn-default btn-lg">Register as Seller</a>
            </div>
            <div class="col-md-6">
              <a href="{{route('register',['id'=>'working_partner'])}}" class="an-btn an-btn-default btn-lg">Register as Working Partner</a>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  