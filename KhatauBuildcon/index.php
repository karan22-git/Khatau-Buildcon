<?php
	// Message Vars
	$msg = '';
	$msgClass = '';

	// Check For Submit
	if(filter_has_var(INPUT_POST, 'submit')){
		// Get Form Data
		$name = htmlspecialchars($_POST['name']);
		$sub = htmlspecialchars($_POST['subject']);
		$email = htmlspecialchars($_POST['email']);
		$message = htmlspecialchars($_POST['message']);

		// Check Required Fields
		if(!empty($email) && !empty($name) && !empty($message)){
			// Passed
			// Check Email
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				// Failed
				$msg = 'Please use a valid email';
				$msgClass = 'mail-fail';
			} else {
				// Passed
				$toEmail = 'khataubuildcon@gmail.com';
				$subject = 'Contact Request From '.$name. 'For' .$sub ;
				$body = '<h2>Contact Request</h2>
					<h4>Name</h4><p>'.$name.'</p>
					<h4>Email</h4><p>'.$email.'</p>
					<h4>Message</h4><p>'.$message.'</p>
				';

				// Email Headers
				$headers = "MIME-Version: 1.0" ."\r\n";
				$headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

				// Additional Headers
				$headers .= "From: " .$name. "<".$email.">". "\r\n";

				if(mail($toEmail, $subject, $body, $headers)){
					// Email Sent
					$msg = 'Your email has been sent';
					$msgClass = 'mail-status';
					$_POST = array();
				} else {
					// Failed
					$msg = 'Your email was not sent';
					$msgClass = 'mail-fail';
				}
			}
		} else {
			// Failed
			$msg = 'Please fill in all fields';
			$msgClass = 'mail-fail';
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/281977937d.js"
      crossorigin="anonymous"
    ></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/buildcon-main.css" />
    <link rel="icon" href="images/logo.jpg" type="image/png" sizes="16x16">

    <title>Khatau Buildcon</title>
  </head>
  <body>

    <div class="navigation">
      <input type="checkbox" id="navi-toggle" class="navigation__checkbox">
      <label for="navi-toggle" class="navigation__button">
        <span class="navigation__icon">&nbsp;</span>
      </label>
      <div class="navigation__background">&nbsp;</div>
      <nav class="navigation__nav">
        <ul class="navigation__list">
          <li class="navigation__item"> <a href="#home" onclick="hide_nav()" class="navigation__link" id="home_link"><span>01.</span>Home</a></li>
          <li class="navigation__item"> <a  href="#about" onclick="hide_nav()" class="navigation__link" id="about_link"><span>02.</span>About US</a></li>
          <li class="navigation__item"> <a  href="#service" onclick="hide_nav()" class="navigation__link" id="service_link"><span>03.</span>Services</a></li>
          <li class="navigation__item"> <a  href="#contact" onclick="hide_nav()" class="navigation__link" id="contact_link"><span>04.</span>Contact Us</a></li>
        </ul>
      </nav>
    </div>

    <header class="header" id="home">
       <div class="header__logo-box">
      <a href="#home" class="logo_link">  <img src="/images/logo.jpg" alt="logo" class="header__logo" /> </a>
      </div>

      <div class="header__text-box">
        <h1 class="heading-primary">
          <span class="heading-primary--main">Khatau Buildcon</span>
          <span class="heading-primary--sub">Building it better in Concrete</span>
        </h1>

        <a href="#service" class="btn btn--white btn--animated">Know More</a>
      </div>
    </header>

    <main>
      <section class="section-about" id="about">
        <div class="u-center-text u-margin-bottom-big">
          <h2 class="heading-secondary">About Us</h2>
        </div>
        <div class="row">
          <div class="col-1-of-2">
            <h3 class="heading-tertiary u-margin-bottom-small">Vision</h3>
            <p class="paragraph">
              Khatau Buildcon aims to be amongs best contractors across India
              and a leading company in Geotechnical works
            </p>
            <h3 class="heading-tertiary u-margin-bottom-small">Mission</h3>
            <p class="paragraph">
              Khatau Buildcon aims to be a national player in Indian
              Construction Industry who safely, profitably and sustainably
              delivers best integrated services, products and solutions to meet
              customer needs
            </p>
            <a href="#service" class="btn-text">Learn More &rarr;</a>
          </div>
          <div class="col-1-of-2">
            <div class="composition">
              <img
                src="images/road.jfif"
                alt="photo 1"
                class="composition__photo composition__photo--p1"
              />
              <img
                src="images/jcb.jpg"
                alt="photo 2"
                class="composition__photo composition__photo--p2"
              />
              <img
                src="images/bg.jpg"
                alt="photo 3"
                class="composition__photo composition__photo--p3"
              />
            </div>
          </div>
        </div>
      </section>

      <section class="section-services" id="service">
        <div class="u-center-text u-margin-bottom-md">
          <h2 class="heading-secondary">Services</h2>
        </div>
        <div class="row">

          <div class="col-1-of-3">
            <div class="card"><div class="card__side card__side--front">
              <div class="card__picture card__picture--1">
                
              </div>
              <div class="card__heading">
                <h2 class="heading-fourth u-center-text u-margin-top-md">Infrastructure Projects </h2>  
              </div> 
            </div>
            <div class="card__side card__side--back"> 
              <div class="card__heading card__heading--back">
                <h2 class="heading-fourth u-center-text u-margin-top-md">Infrastructure Projects </h2>  
              </div> 
              <div class="card__description">
                <p class="paragraph">
                  Specialised In Geotechnical Works.
                </p>
              </div>
              <a href="#contact" class="form__btn btn--submit card__btn">Build with Us </a></div>
          </div>
          </div>

          <div class="col-1-of-3">
            <div class="card"><div class="card__side card__side--front">
              <div class="card__picture card__picture--2">
                &nbsp;
          </div>
          <div class="card__heading">
            <h2 class="heading-fourth u-center-text u-margin-top-md">Government Projects </h2>  
          </div>
            </div>
            <div class="card__side card__side--back"> 
              <div class="card__heading card__heading--back">
                <h2 class="heading-fourth u-center-text u-margin-top-md">Government Projects </h2>  
              </div> 
              <div class="card__description">
                <p class="paragraph">
                  Registered Contractors in Road and Building Departments.
                </p>
              <a href="#contact" class="form__btn btn--submit card__btn">Build with Us </a></div>
          </div>
          </div>
          </div>

          <div class="col-1-of-3">
            <div class="card"><div class="card__side card__side--front">
              <div class="card__picture card__picture--3">
                &nbsp;
          </div>
          <div class="card__heading">
            <h2 class="heading-fourth u-center-text u-margin-top-md">Commercial Projects </h2>  
          </div>
            </div>
            <div class="card__side card__side--back"> 
              <div class="card__heading card__heading--back">
                <h2 class="heading-fourth u-center-text u-margin-top-md">Commercial & Residential Projects </h2>  
              </div> 
              <div class="card__description">
                <p class="paragraph">
                  Developers and Contactors.
                </p>
              <a href="#contact" class="form__btn btn--submit card__btn">Build with Us </a></div>
          </div>
        </div>
      </section>

      <section class="section-contact" id="contact">
        <div class="sub-contact">
          <div class="u-center-text u-margin-bottom-md u-margin-top-big">
            <h3 class="heading-secondary">Contact Us</h3>
          </div>
          <div class="row col-1-of-2 contact-form">
            <div class="u-center-text u-margin-top-small">
              <h2 class="heading-fourth">Quick&nbsp; Contact</h2>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form" autocomplete="off">
              <div class="form__input">
                <input
                  type="text"
                  class="form__input--text placeholder-animation"
                  name="name"
                  placeholder="Name"
                  id="name"
                  value=""
                  required
                />
                <label for="name" class="form__label">Name</label>
              </div>
              <div class="form__input">
                <input
                  type="email"
                  class="form__input--text placeholder-animation"
                  name="email"
                  placeholder="Email"
                  id="email"
                  value=""
                  required
                />
                <label for="email" class="form__label">Email</label>
              </div>
              <div class="form__input">
                <input
                  type="text"
                  class="form__input--text placeholder-animation"
                  name="subject"
                  placeholder="Subject"
                  id="subject"
                  value=""
                  required
                />
                <label for="subject" class="form__label">Subject</label>
              </div>
              <div class="form__textarea">
                <textarea
                  name="message"
                  id="message"
                  cols="30"
                  rows="3"
                  placeholder="Message"
                  value=""
                  required
                  class="form__textarea--text placeholder-animation"
                ></textarea>
                <label for="message" class="form__label">Message</label>
              </div>
              <button type="submit" class="form__btn btn--submit" name="submit">Submit</button>
            </form>
     <!--       <?php if($msg != ''): ?>-->
    	<!--	<div class="mail-status" <?php echo $msgClass; ?>"><?php echo $msg; ?></div>-->
    	<!--<?php endif; ?>-->
          </div>
          <div class="col-1-of-3 contact-details">
            <!-- <div class="contact__logo-box">
              <img src="/images/logo.jpg" alt="logo" class="contact__logo" />
            </div> -->
            <div class="contact-address">
              <i class="fa fa-map-marker-alt"></i>
              <h4 class="heading-fourth">Khatau Buildcon</h4>
              <ul>
                <li>  Mumbai, Maharashtra.</li><li>   Vapi, Gujarat.</li>
              </ul>         
            </div>
            <div class="contact-no">
              <i class="fa fa-phone"></i>
              <p class="paragraph">+91 8097200439</p>
            </div>
            <div class="contact-mail">
              <i class="fa fa-envelope"></i>
              <p class="paragraph">
                <a href="mailto:khataubuildcon@gmail.com" class="mail-link">khataubuildcon@gmail.com</a>
              </p>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer class="footer">
      <div class="footer__menu--box">
        <ul class="footer__menu">
          <li class="footer__menu--items"><a href="#home" class="footer__menu--items--links"> Home</li> </a>
          <li class="footer__menu--items"><a href="#about" class="footer__menu--items--links"> About Us</li> </a>
          <li class="footer__menu--items"><a href="#service" class="footer__menu--items--links"> Services</li> </a>
          <li class="footer__menu--items"><a href="#contact" class="footer__menu--items--links"> Contact</li> </a>
          <li class="footer__menu--items"> Connect with Us:</li> </a>
        </ul>
      </div>
      <div class="social-media">
        <a href="https://www.facebook.com/Khataubuildcon/" target="_blank"><i class="fab fa-facebook-square fa-2x"></i></a>
        <a href="https://www.linkedin.com/company/khatau-buildcon" target="_blank"><i class="fab fa-linkedin fa-2x"></i></a>
        <a href="https://www.twitter.com/@Khataubuildcon" target="_blank"><i class="fab fa-twitter-square fa-2x"></i></a>
      </div>
      <div class="footer__copyright">
        <p class="paragraph">
          Copyright &copy; Khatau Buildcon .2020. All rights reserved.
        </p>
      </div>
    </footer>

    <div class="popup" id="infra-popup">
      <div class="popup__content">
        <div class="popup__left">
          <img src="images/jcb.jpg" alt="" class="popup__img">
        </div>
        <div class="popup__right">
          <a href="#section-service" class="popup__close">&times;</a>
          <h2 class="heading-secondary">Infrastructure Projects</h2>
          <p class="popup__text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum quasi, officiis fugit hic atque itaque voluptatem cupiditate neque facilis perferendis enim nihil, possimus sit deleniti?
          </p>
          <a href="" class="btn btn-white popup-btn">Construct With Us</a>
        </div>
      </div>
    </div>
    <div class="popup" id="govt-popup">
      <div class="popup__content">
        <div class="popup__left">
          <img src="images/jcb.jpg" alt="" class="popup__img">
        </div>
        <div class="popup__right">
          <a href="#section-service" class="popup__close">&times;</a>
          <h2 class="heading-secondary">Government Projects</h2>
          <p class="popup__text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum quasi, officiis fugit hic atque itaque voluptatem cupiditate neque facilis perferendis enim nihil, possimus sit deleniti?
          </p>
          <a href="" class="btn btn-white popup-btn">Construct With Us</a>
        </div>
      </div>
    </div>
    <div class="popup" id="commercial-popup">
      <div class="popup__content">
        <div class="popup__left">
          <img src="images/jcb.jpg" alt="" class="popup__img">
        </div>
        <div class="popup__right">
          <a href="#section-service" class="popup__close">&times;</a>
          <h2 class="heading-secondary">Commercial & Residential Projects</h2>
          <p class="popup__text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum quasi, officiis fugit hic atque itaque voluptatem cupiditate neque facilis perferendis enim nihil, possimus sit deleniti?
          </p>
          <a href="" class="btn btn-white popup-btn">Construct With Us</a>
        </div>
      </div>
    </div>
    
    <!-- stop form resubmission -->
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    
    function hide_nav(){
      document.getElementById("navi-toggle").checked = false;
    }
</script>
  </body>
</html>
