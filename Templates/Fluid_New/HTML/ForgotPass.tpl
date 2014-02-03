<body>
<div id="main_container">

	<div class="header_login">
    <div class="logo"><a href="#"><img src="images/logo.gif" alt="" title="" border="0" /></a></div>
    
    </div>

     
         <div class="login_form">
         
         <h3>Forgot Password</h3>
         
         <a href="#" class="forgot_pass">Forgot password</a> 
         
         <form action="" method="post" class="niceform">
				{$LoginErr}
                <fieldset>
                    <dl>
                        <dt><label for="Username">Username:</label></dt>
                        <dd><input type="text" name="Username" id="" size="54" /></dd>
                    </dl>
                    <dl>
                        <dt><label for="RecoveryType">Recovery Type:</label></dt>
                        <dd>
							<select name="Type">
								<option value="Email">Email</option>
								<option value="Mobile">Mobile</option>
							</select>						
						</dd>
                    </dl>
                    <dl>
						<dd><input type="hidden" name="FormID" value="5698" size="54"></dd>
					</dl>
                    
                     <dl class="submit">
                    <input type="submit" name="submit" id="submit" value="Enter" />
                     </dl>
                    
                </fieldset>
                
         </form>
         </div>  
          
	
    
    <div class="footer_login">    
    	<div class="left_footer_login">FluidSQL | Powered by <a href="#">Daryls Development</a></div>    
    </div>

</div>		
</body>
</html>