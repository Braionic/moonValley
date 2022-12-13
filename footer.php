<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<h3>Moon Valley</h3>
					<div class="links">
						<ul>
                            <li><a href="index.php">Home</a></li>
							<li><a href="login.php">Login</a></li>
							<li><a href="register.php">Register</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<h3>Useful Links</h3>
					<div class="links">
						<ul>
							<li><a href="help.html">Help Center</a></li>
							<li><a href="$">Faq</a></li>
							<li><a href="register.php">Become an Influencer</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<h3>Resources</h3>
					<div class="links">
						<ul>
                            <li><a href="#0">Community</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
				    <h3>Keep in touch</h3>
				    <div id="newsletter">
				        <div id="message-newsletter"></div>
				        <form method="post" name="newsletter_form" id="newsletter_form">
				            <div class="form-group">
				                <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
				                <button type="submit" id="submit-newsletter"><i class="bi bi-chevron-right"></i></button>
				            </div>
				        </form>
				    </div>
				    <div class="follow_us">
				        <ul>
				            <li>
				                <a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/twitter_icon.svg" alt="" class="lazy"></a>
				            </li>
				            <li>
				                <a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/facebook_icon.svg" alt="" class="lazy"></a>
				            </li>
				            <li>
				                <a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/instagram_icon.svg" alt="" class="lazy"></a>
				            </li>
				            <li>
				                <a href="#0"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/youtube_icon.svg" alt="" class="lazy"></a>
				            </li>
				        </ul>
				    </div>
				</div>
			</div>
			<!-- /row-->
			<hr>
			<div class="row add_bottom_25">
				<div class="col-md-6">
					<ul class="footer-selector clearfix">
						<li>
							<div class="styled-select lang-selector">
								<select>
									<option value="English" selected>English</option>
									<option value="French">French</option>
									<option value="Spanish">Spanish</option>
									<option value="Russian">Russian</option>
								</select>
							</div>
						</li>
					</ul>
				</div>
				<div class="col-md-6">
					<ul class="additional_links">
						<li><a href="#0">Terms and conditions</a></li>
						<li>© 2022 Moon Valley</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->

	<div id="toTop"></div><!-- Back to top button -->

	
	<!-- COMMON SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/common_scripts.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/common_func.js"></script>

    <!-- SPECIFIC SCRIPTS -->
	<script src="js/carousel-home.js"></script>
                       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
        $(document).ready(function(){
          $("#live_search").keyup(function(){

              var input = $(this).val();
              //alert(input);
              if(input != ""){
                  $.ajax({
                      url: "livesearch.php",
                      method: "POST",
                      data:{input:input},

                      success:function(data){
                          $("#searchresult").html(data);
                          $("#searchresult").css("display","block");
                      }
                  });
              }else{
                  $("#searchresult").css("display","none");
              }
          });           

      });
    
    
</script>
<script>
    
     
    
 $(document).ready(function(){
          $("#category").on('change',function(){
              var value = $(this).val();
              $.ajax({
                  url: "se.php",
                  type: "POST",
                  data: {id: value },
                     success:function(data){
                  $(".author_list").html(data);
              }
              });
          });
            
      });
          </script>

</body>
</html>